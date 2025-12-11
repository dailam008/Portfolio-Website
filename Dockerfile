FROM php:8.2-apache

# INSTALL EXTENSIONS
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql

# ENABLE APACHE MOD_REWRITE
RUN a2enmod rewrite

# COPY SOURCE
WORKDIR /var/www/html
COPY . .

# INSTALL COMPOSER
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# SET PERMISSIONS
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080
CMD ["apache2-foreground"]
