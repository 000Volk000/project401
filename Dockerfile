# Use an official PHP-FPM image as the base
FROM php:8.2-fpm

# Use nginx-php-fpm as a base if required (keeping this in case you need it)
# FROM richarvey/nginx-php-fpm:1.7.2

# Set environment variables
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

# Set the working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Run Composer to install dependencies
RUN if [ "$SKIP_COMPOSER" -ne 1 ]; then \
    composer install --no-dev --optimize-autoloader; \
    fi

# Ensure permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy the start.sh script and ensure it's executable
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Expose application port
EXPOSE 9000

# Start the application
CMD ["/start.sh"]
