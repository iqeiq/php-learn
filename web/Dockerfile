FROM php:5.6-apache

RUN apt-get update
RUN docker-php-ext-install mysqli pdo_mysql mbstring

COPY ./php.ini /usr/local/etc/php/
COPY httpd.conf /etc/httpd/conf.d/phplearn.conf
