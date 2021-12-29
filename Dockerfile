FROM php:7.2-apache
RUN apt-get update -y && apt-get dist-upgrade -y\
    && apt-get install vim -y\
    && apt-get install inetutils-ping -y && apt-get install net-tools -y
EXPOSE 80