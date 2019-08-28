FROM php:7.2-apache
COPY ./php.ini /usr/local/etc/php/
COPY ./sites-available/000-default.conf  /etc/apache2/sites-available/
COPY ./sites-available/default-ssl.conf  /etc/apache2/sites-available/
# SSL
RUN apt-get update && apt-get install -y \
  libssl-dev \
  openssl \
  ssl-cert \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* \
  && a2enmod ssl \
  && a2ensite default-ssl
# PDO
RUN docker-php-ext-install pdo_mysql
# xdebug
RUN pecl install xdebug \
  && docker-php-ext-enable xdebug
# GD
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd
# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Git
RUN apt-get -y install git
