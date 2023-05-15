FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install zip pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Install application dependencies
RUN composer install --no-scripts --no-autoloader && \
    composer dump-autoload --optimize

# Expose port 9000 and start php-fpm server
EXPOSE 8080
CMD ["php-fpm", "-F", "-R"]
