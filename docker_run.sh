#!/bin/bash
set -e

cd /var/www; php artisan config:cache
php artisan db:seed
php artisan route:cache
env >> /var/www/.env
php-fpm7.4 -D
nginx -g "daemon off;"
