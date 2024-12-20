#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer dump-autoload

# Run Composer (if needed)
if [ ! -d "vendor" ]; then
  composer install --no-dev --optimize-autoloader
fi


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

php-fpm

echo "done deploying"
