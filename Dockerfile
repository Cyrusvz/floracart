FROM php:apache

# Install the missing PDO MySQL plugin so PHP can talk to Aiven
RUN docker-php-ext-install pdo_mysql

COPY . /var/www/html/
EXPOSE 80