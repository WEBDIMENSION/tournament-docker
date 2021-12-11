FROM php:7.2.8-fpm
RUN apt-get update && apt-get install -y \
  libssl-dev \
  git \
  wget \
  unzip \
  vim
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
#RUN pecl install xdebug-2.9.8 \
#  && docker-php-ext-enable xdebug
RUN pecl install xdebug \
  && docker-php-ext-enable xdebug
# php-zip
RUN apt-get install -y zlib1g-dev \
    && docker-php-ext-install zip
##Chrome Driver RUN apt-get install -y libnss3
#RUN wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | apt-key add -
#RUN echo "deb http://dl.googlttcom/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google.list
#RUN apt-get update && apt-get install -y google-chrome-stable
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

