#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --optimize-autoloader

echo "Setting permissions"
sudo chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching view..."
php artisan view:cache

echo "Running migrations..."
php artisan migrate --force

echo "Running seeders"
php artisan db:seed --force

echo "done deploying"
