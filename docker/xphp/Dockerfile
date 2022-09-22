FROM ubuntu:jammy

ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt update && apt upgrade -y
RUN apt install php -y

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

RUN apt install git -y
RUN apt install openssl -y
RUN apt install libssl-dev -y
RUN apt install libcurl4-openssl-dev -y
RUN apt install zip -y
RUN apt install build-essential -y
RUN apt install unzip -y
RUN apt install zlib1g-dev -y
RUN apt install libzip-dev -y
RUN apt install curl -y
RUN apt install libcurl4-openssl-dev -y
RUN apt install libxml2-dev -y
RUN apt install vim -y
RUN apt install openssh-client -y
RUN apt install iputils-ping -y
RUN apt install php-pear -y
RUN apt install php-dev -y

RUN pecl install raphf
RUN apt install php-raphf -y
RUN pecl install pecl_http

RUN apt install php-mysql -y
RUN apt install php-http -y
RUN apt install php-raphf -y

RUN apt install php-zip php-curl php-xml php-pdo -y
RUN apt install php-fpm -y

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash -E
RUN apt install symfony-cli

RUN apt install npm -y
RUN apt install lsof -y

RUN apt install php-gearman -y
RUN apt install php-xdebug -y

EXPOSE 9000
CMD php-fpm8.1 -F

#RUN composer require twig
#RUN composer require symfony/webpack-encore-bundle
#RUN composer require symfony/maker-bundle --dev

#RUN symfony console make:controller ChatController

