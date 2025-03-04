#!/bin/bash

set -e

log() {
    echo "$(date +'%Y-%m-%d %H:%M:%S') - $1"
}

log "Starting entrypoint script..."

if [ ! -f "vendor/autoload.php" ]; then
    log "Installing Composer dependencies..."
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    log "Creating .env file for environment $APP_ENV..."
    cp .env.example .env
else
    log ".env file already exists."
fi

log "Installing Composer dependencies..."
composer install --prefer-dist --no-interaction --no-progress --no-suggest --no-dev

log "Generating application key..."
php artisan key:generate --force

log "Running migrations..."
php artisan migrate --force

log "Creating storage link..."
php artisan storage:link --force

log "Starting PHP-FPM..."
php-fpm
