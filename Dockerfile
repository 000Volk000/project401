# Use official PHP image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 9000

# Add start.sh script
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Start the application
CMD ["/start.sh"]
