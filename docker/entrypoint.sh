#!/usr/bin/env sh
set -e

cd /var/www/html

if [ ! -f .env ]; then
    cp .env.example .env
fi

mkdir -p database storage/framework/cache/data storage/framework/sessions storage/framework/testing storage/framework/views storage/logs bootstrap/cache
mkdir -p storage/app/public

if [ ! -L public/storage ]; then
    rm -rf public/storage
    ln -s /var/www/html/storage/app/public public/storage
fi

if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
    touch "${DB_DATABASE:-/var/www/html/storage/database.sqlite}"
fi

chown -R www-data:www-data database storage bootstrap/cache

if ! grep -q '^APP_KEY=base64:' .env; then
    php artisan key:generate --force
fi

php artisan config:clear
php artisan migrate --force

exec "$@"
