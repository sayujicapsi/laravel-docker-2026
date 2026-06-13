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

# Install system dependencies + PHP extensions.
# git/nodejs/npm are runtime tools: the entrypoint pulls the branch and
# rebuilds composer deps + front-end assets on every container start.
RUN apk add --no-cache \
        libpng-dev \
        libjpeg-turbo-dev \
        libwebp-dev \
        libzip-dev \
        zip \
        unzip \
        oniguruma-dev \
        git \
        nodejs \
        npm \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        zip \
        bcmath \
        opcache

# Composer binary for runtime dependency installs
COPY --from=vendor /usr/bin/composer /usr/bin/composer

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

# Entrypoint syncs the code to origin/<branch> at startup, then runs php-fpm
COPY docker/app/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 9000
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
