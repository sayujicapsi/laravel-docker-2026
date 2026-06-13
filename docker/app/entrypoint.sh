#!/bin/sh
# Pull-at-startup entrypoint: sync the served code to origin/<branch> on every
# boot, then refresh dependencies/assets before handing off to php-fpm.
set -e

APP_DIR="/var/www/html"
BRANCH="${GIT_BRANCH:-main}"
REPO_URL="${GIT_REPO_URL:-https://github.com/sayujicapsi/laravel-docker-2026.git}"

log() { echo "[entrypoint] $*"; }

cd "$APP_DIR"

# --- Sync code from git ----------------------------------------------------
# Inject a token for private repos (https only). It is used for the fetch and
# then scrubbed from the stored remote so it never lingers on disk.
auth_url="$REPO_URL"
if [ -n "$GIT_TOKEN" ]; then
    case "$REPO_URL" in
        https://*) auth_url="https://x-access-token:${GIT_TOKEN}@${REPO_URL#https://}" ;;
    esac
fi

# The image ships the code without a .git dir, so initialise one in place the
# first time. Untracked, build-generated dirs (vendor, node_modules,
# public/build) are left alone by fetch/reset, so the baked baseline survives.
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

# --- PHP dependencies ------------------------------------------------------
# Fast no-op when the lockfile already matches the baked vendor dir.
log "Installing composer dependencies"
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# --- Front-end assets ------------------------------------------------------
if [ "${BUILD_ASSETS:-true}" = "true" ]; then
    [ -d node_modules ] || { log "Installing npm dependencies"; npm ci --no-audit --no-fund; }
    log "Building front-end assets"
    npm run build
fi

# --- Laravel optimisation --------------------------------------------------
# Note: no route:cache — routes/web.php uses a closure route, which can't be
# serialised. config:cache is safe.
rm -f bootstrap/cache/packages.php
php artisan package:discover --ansi
php artisan config:cache

if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
    log "Running migrations"
    php artisan migrate --force
fi

# --- Permissions for runtime-writable paths --------------------------------
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

log "Startup complete; exec: $*"
exec "$@"
