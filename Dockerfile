# --- Stage 1: Composer dependencies ---
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

# --- Stage 2: Frontend assets ---
FROM node:22-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json* ./
RUN npm ci
COPY . .
RUN npm run build

# --- Stage 3: Final image ---
FROM php:8.2-fpm-alpine

# Install system dependencies + PHP extensions
RUN apk add --no-cache \
        libpng-dev \
        libjpeg-turbo-dev \
        libwebp-dev \
        libzip-dev \
        zip \
        unzip \
        oniguruma-dev \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        zip \
        bcmath \
        opcache

WORKDIR /var/www/html

# Copy app source
COPY . .

# Copy vendor from stage 1
COPY --from=vendor /app/vendor ./vendor

# Copy built frontend assets from stage 2
COPY --from=frontend /app/public/build ./public/build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN rm -f bootstrap/cache/packages.php && php artisan package:discover --ansi

EXPOSE 9000
CMD ["php-fpm"]
