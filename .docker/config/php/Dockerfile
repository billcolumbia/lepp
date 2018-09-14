FROM php:7.2-fpm

RUN apt-get -y update && apt-get -y install libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev libpq-dev
RUN docker-php-ext-configure zip --with-libzip=/usr/include \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include --with-jpeg-dir=/usr/include \
	&& docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip mbstring gd

RUN yes | pecl install xdebug
COPY ./php.ini /usr/local/etc/php/conf.d/

EXPOSE 9000