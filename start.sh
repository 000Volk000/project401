#!/usr/bin/env bash

# Ensure the composer global package is installed and autoload is dumped
echo "Running composer"
composer global require hirak/prestissimo
composer dump-autoload

# Run Composer install if vendor directory does not exist
if [ ! -d "vendor" ]; then
  composer install --no-dev --optimize-autoloader
fi

# Set proper permissions for Laravel storage and cache directories
echo "Setting permissions"
sudo chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Cache the config, routes, and views
echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching views..."
php artisan view:cache

# Run migrations and seeders if needed
echo "Running migrations..."
php artisan migrate --force

echo "Running seeders..."
php artisan db:seed --force

# Start PHP-FPM and Nginx
php-fpm &
nginx -g 'daemon off;'

echo "done deploying"
