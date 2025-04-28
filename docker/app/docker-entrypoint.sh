#!/bin/sh
set -e

echo "🚀 Starting container in environment: ${APP_ENV:-production}"

if [ ! -f "./artisan" ]; then
    echo "❌ Invalid Laravel project directory: $PWD"
    exit 1
fi

# If local environment, prepare
if [ "$APP_ENV" = "local" ]; then
    if [ ! -f "./vendor/autoload.php" ]; then
        echo "📦 Running composer install (local development)..."
        composer install

        echo "🔑 Running artisan key:generate (local development)..."
        php artisan key:generate

        echo "🎯 Running database migrations and seeds (local development)..."
        php artisan migrate
    fi
else
    # In production environment
    echo "Caching Laravel config and routes (production)..."
    php artisan config:cache
    php artisan route:cache
fi

exec "$@"
