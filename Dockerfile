# Use a base image that includes both Nginx and PHP-FPM
FROM richarvey/nginx-php-fpm:1.7.2

# Use PHP 8.2 (you can update this as per your Laravel version requirement)
FROM php:8.2-fpm

# Set up the working directory and copy your app files
WORKDIR /var/www/html
COPY . .

# Set the Laravel environment variables
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y libpq-dev nginx \
    && docker-php-ext-install pdo pdo_mysql

# Set up permissions for Laravel directories
# Create the required directories if they do not exist
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache

# Set ownership and permissions for Laravel directories
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache


# Copy the Nginx configuration file into the container
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-available/default

# Expose the HTTP and HTTPS ports
EXPOSE 80 443

# Copy start.sh into the Docker image
COPY start.sh /start.sh

# Ensure it's executable
RUN chmod +x /start.sh

# Start PHP-FPM and Nginx together
CMD ["bash", "/start.sh"]
