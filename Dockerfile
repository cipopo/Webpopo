FROM php:7.1.5-apache

RUN rm -rf /var/www/html/*
ADD web/ /var/www/html/

#add mirror source List
ADD ./sources.list /etc/apt/sources.list

# Add init SQL data
ADD ./security.sql /var/security.sql

# Install mysqlimport
RUN apt-get update
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install mariadb-server-10.0

# PHP7 Extensions
RUN docker-php-ext-install mysqli

# mongodb extensions
RUN pecl install mongodb
RUN docker-php-ext-enable mongodb

EXPOSE 80

RUN chown www-data:www-data /var/www/html -R

# Config entrypoint
COPY ./docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh

ENTRYPOINT ["/docker-entrypoint.sh"]