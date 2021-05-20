#A partir d'une image ubuntu
FROM ubuntu:latest

# Installation
RUN apt-get update
RUN apt-get install -y nginx
RUN apt-get install -y nano
RUN apt-get install -y php7.4 php7.4-fpm 

RUN mkdir -p /var/www/statique/
RUN mkdir -p /var/www/b2b/
RUN mkdir -p /var/www/intranet/

COPY sites/www/index.html /var/www/statique/
COPY sites/b2b/index.php  /var/www/b2b/
COPY sites/intranet/index.html /var/www/intranet/

COPY www.conf /etc/nginx/sites-available/
COPY b2b.conf /etc/nginx/sites-available/
COPY intranet.conf /etc/nginx/sites-available/

RUN ln -s /etc/nginx/sites-available/www.conf /etc/nginx/sites-enabled/
RUN ln -s /etc/nginx/sites-available/b2b.conf /etc/nginx/sites-enabled/
RUN ln -s /etc/nginx/sites-available/intranet.conf /etc/nginx/sites-enabled/

EXPOSE 80

CMD service php7.4-fpm start && nginx -g "daemon off;"

