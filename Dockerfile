# Use the official PHP image with PHP-FPM
FROM php:8.1-fpm-alpine

RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    docker-php-ext-enable mysqli &&\
    apk add --no-cache nginx

COPY . /var/www/html/

COPY ./config/def.conf /etc/nginx/nginx.conf
COPY ./config/nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

# Command to start Nginx
CMD ["nginx", "-g", "daemon off;"]