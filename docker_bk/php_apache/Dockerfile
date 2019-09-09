FROM php:7.2-apache
COPY ./php_apache/php.ini /usr/local/etc/php/
COPY ./php_apache/sites-available/000-default.conf  /etc/apache2/sites-available/
COPY ./php_apache/sites-available/default-ssl.conf  /etc/apache2/sites-available/
COPY ./php_apache/mods-enabled/rewrite.load  /etc/apache2/mods-enabled/
# SSL
COPY ./ssl  /etc/apache2/ssl/
RUN apt-get update && apt-get install -y \
  libssl-dev \
  git \
  unzip \
  vim \
  openssl \
  ssl-cert \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* \
  && a2enmod ssl \
  && a2ensite default-ssl
RUN apt-get -y update
RUN apt-get install -y \
    curl \
        gnupg
        RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -
        RUN apt-get install -y nodejs
        RUN npm install npm@latest -g
# PDO
RUN docker-php-ext-install pdo_mysql
# redis
RUN docker-php-source extract
RUN git clone -b 4.1.1 --depth 1 https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis && \
    docker-php-ext-install redis
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
