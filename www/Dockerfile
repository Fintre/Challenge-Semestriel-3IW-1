FROM php:8.0-apache

RUN apt-get update

RUN apt-get install -y libyaml-dev

RUN pecl install yamL

RUN a2enmod rewrite
