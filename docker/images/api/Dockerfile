FROM php:8.1-fpm-buster

RUN buildDeps="curl libpq-dev libzip-dev libonig-dev openssl libssl-dev libcurl4-openssl-dev  libicu-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev libmagickwand-6.q16-dev libldap2-dev wget zip unzip libaio1" && \
    apt-get update && \
    apt-get install -y $buildDeps --no-install-recommends && \
    pecl install -o -f redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install \
        curl \
        dom \
        mbstring \
        simplexml \
        zip \
        opcache \
        gd \
        pdo \
        pdo_mysql \
        sockets \
        intl

RUN cd ~ && curl -sS https://getcomposer.org/installer -o composer-setup.php && \
 php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
 && chmod +x /usr/local/bin/composer