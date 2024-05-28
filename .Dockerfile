# Use the official PHP image with PHP-FPM
FROM php:8.3-fpm-alpine

# Install necessary dependencies and PHP extensions
RUN apk add --no-cache \
    freetype \
    libjpeg-turbo \
    libpng \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql

# Copy your PHP application files to the container
COPY ./src /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Expose the PHP-FPM port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
