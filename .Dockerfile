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
    nginx \
    supervisor \
    && docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql

# Copy configuration files
COPY ./config/nginx.conf /etc/nginx/nginx.conf
COPY ./config/php-fpm.conf /usr/local/etc/php-fpm.d/zzz-custom.conf
COPY ./config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy your application files to the container
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Expose the port NGINX will serve on
EXPOSE 80

# Start Supervisor, which will manage NGINX and PHP-FPM
CMD ["/usr/bin/supervisord"]
