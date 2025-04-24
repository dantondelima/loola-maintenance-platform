#!/bin/sh
set -e

if [ ! -f "./artisan" ]; then
    echo "Invalid directory: $PWD"
    exit 1
fi

if [ ! -f "./vendor/autoload.php" ]; then
    printf "\e[35mStarting up container for the first time\e[0m\n"
    printf "\n"
    printf "\e[35mRunning composer install...\e[0m\n"
    composer install
    printf "\e[35mRunning migrations...\e[0m\n"
    php artisan migrate --seed
    printf "\e[35mGenerating key...\e[0m\n"
    php artisan key:generate
fi

exec "$@"
