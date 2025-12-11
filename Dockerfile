# Dockerfile
FROM php:8.2-apache

# Install extensions & tools
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip unzip git curl \
    && docker-php-ext-install pdo_mysql gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable Apache Rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Copy Aiven SSL CA Certificate
COPY certs/aiven-ca.pem /var/www/html/certs/aiven-ca.pem

# Install Laravel dependencies (no dev)
RUN composer install --optimize-autoloader --no-dev

# Set permissions (Laravel storage & cache)
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Optimize Laravel
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Expose port 80
EXPOSE 80

# Final CMD
CMD ["apache2-foreground"]
