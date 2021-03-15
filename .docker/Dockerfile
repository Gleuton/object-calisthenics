FROM php:8.0-fpm
RUN apt-get update
RUN apt-get install -y openssl git
RUN docker-php-ext-install pdo_mysql bcmath
RUN pecl install ds && docker-php-ext-enable ds
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

EXPOSE 9000