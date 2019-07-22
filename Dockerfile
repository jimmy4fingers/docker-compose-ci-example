FROM php:7.3-fpm as php_base
RUN apt-get update && apt-get install -y \
    && apt-get install zip -y \
    && apt-get install unzip -y \
    && apt-get install libzip-dev -y \
    && docker-php-ext-install zip

WORKDIR /var/www/html
COPY . /var/www/html

FROM php_base as project_composer
RUN apt-get install git -y
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

FROM project_composer as dev_build
RUN composer install -o --apcu-autoloader

FROM php_base as dev_php_base
RUN pecl install xdebug-2.7.0RC2
RUN docker-php-ext-enable xdebug
COPY --from=dev_build /var/www/html /var/www/html
