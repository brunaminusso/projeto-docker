FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    git \
    && docker-php-ext-install mysqli

WORKDIR /var/www/html

COPY ./index.php .
