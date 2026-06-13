#!/bin/sh
# Entrypoint with two modes, selected by GIT_SYNC:
#   GIT_SYNC=true  (default) → production: pull origin/<branch>, install deps,
#                              build assets, cache config, then run php-fpm.
#   GIT_SYNC=false           → local dev: use the mounted source as-is. No git
#                              pull (so your local edits are NOT reset), no build.
set -e

APP_DIR="/var/www/html"
BRANCH="${GIT_BRANCH:-main}"
REPO_URL="${GIT_REPO_URL:-https://github.com/sayujicapsi/laravel-docker-2026.git}"

log() { echo "[entrypoint] $*"; }

cd "$APP_DIR"

if [ "${GIT_SYNC:-true}" = "true" ]; then
    # ===== Production: sync the served code to origin/<branch> ==============
    # Inject a token for private repos (https only), then scrub it afterwards.
    auth_url="$REPO_URL"
    if [ -n "$GIT_TOKEN" ]; then
        case "$REPO_URL" in
            https://*) auth_url="https://x-access-token:${GIT_TOKEN}@${REPO_URL#https://}" ;;
        esac
    fi

    # The image ships the code without a .git dir, so initialise one in place
    # the first time. Untracked, build-generated dirs (vendor, node_modules,
    # public/build) are left alone by fetch/reset, so the baseline survives.
    git config --global --add safe.directory "$APP_DIR" 2>/dev/null || true
    [ -d .git ] || git init -q
    if git remote get-url origin >/dev/null 2>&1; then
        git remote set-url origin "$auth_url"
    else
        git remote add origin "$auth_url"
    fi

    log "Fetching '$BRANCH' from $REPO_URL"
    git fetch --depth 1 origin "$BRANCH"
    git reset --hard FETCH_HEAD
    git checkout -B "$BRANCH" >/dev/null 2>&1 || true
    git remote set-url origin "$REPO_URL"   # scrub token
    log "Checked out $(git rev-parse --short HEAD)"

    log "Installing composer dependencies"
    composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

    if [ "${BUILD_ASSETS:-true}" = "true" ]; then
        [ -d node_modules ] || { log "Installing npm dependencies"; npm ci --no-audit --no-fund; }
        log "Building front-end assets"
        npm run build
    fi

    # Note: no route:cache — routes/web.php uses a closure route (not serialisable).
    rm -f bootstrap/cache/packages.php
    php artisan package:discover --ansi
    php artisan config:cache

    chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true
    chmod -R 775 storage bootstrap/cache 2>/dev/null || true
else
    # ===== Local dev: serve the bind-mounted source as-is ==================
    log "GIT_SYNC=false — using the mounted local source (no git pull, no build)"

    if [ "${BUILD_ASSETS:-false}" = "true" ]; then
        [ -d node_modules ] || { log "Installing npm dependencies"; npm ci --no-audit --no-fund; }
        log "Building front-end assets"
        npm run build
    fi

    # Clear any stale caches so edits to config/routes/views show up live.
    php artisan optimize:clear 2>/dev/null || true

    # Make runtime dirs writable for php-fpm (www-data) without chown-ing
    # host-owned bind-mounted files. 777 is fine on a local dev box.
    chmod -R 777 storage bootstrap/cache 2>/dev/null || true
fi

if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
    log "Running migrations"
    php artisan migrate --force
fi

log "Startup complete; exec: $*"
exec "$@"
