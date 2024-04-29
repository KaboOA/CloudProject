FROM php:apache
WORKDIR /app
COPY . /app
RUN docker-php-ext-install mysqli
RUN apachectl restart
