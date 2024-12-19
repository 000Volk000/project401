# Use an official PHP runtime as the base image
FROM php:8.2-fpm


# Copy the .env.deployment file to .env
COPY .env.deployment .env

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    build-essential \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    nano

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd  # Include pdo_pgsql for PostgreSQL

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files into the container
COPY . .

# Set permissions for Laravel storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Install Laravel dependencies
RUN composer install --optimize-autoloader


#Cleaning cache config
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Generate the application key
RUN php artisan key:generate

# Run database migrations
RUN php artisan migrate:refresh

# Run database seeders
RUN php artisan db:seed

# Expose port 8000
EXPOSE 8000

# Start PHP-FPM and Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
