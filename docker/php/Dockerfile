FROM php:7.2-fpm

# install tools
RUN apt-get update && apt-get install -y --no-install-recommends git nano sudo iproute2 openssh-client procps unzip

# install some php extensions
RUN pecl install xdebug-2.6.0RC2 \
	&& docker-php-ext-enable xdebug \
	&& docker-php-ext-install pcntl \
    && docker-php-ext-install exif \
    && docker-php-ext-install opcache \
    && docker-php-ext-install pdo pdo_mysql

# install APCu extension
RUN pecl install apcu
RUN echo "extension=apcu.so" > /usr/local/etc/php/conf.d/apcu.ini

# create docker sudo user
RUN useradd -ms /bin/bash docker && adduser docker sudo

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer &&\
    chmod +x /usr/local/bin/composer

# install prestissimo and shell autocompletion
USER docker
RUN composer global require hirak/prestissimo && \
    composer global require bamarni/symfony-console-autocomplete && \
    rm -rf $HOME\.composer
USER root

# install node.js
RUN apt-get update && apt-get install -y gnupg
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash - && \
  	apt-get install -y nodejs
