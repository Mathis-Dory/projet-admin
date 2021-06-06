# A partir d'une image ubuntu
FROM ubuntu:latest

# Installation de nginx sur l'image + des installation de packages utiles au bon fonctionnement du site
RUN apt-get update
# NGINX
RUN apt-get install -y nginx
RUN apt-get install -y nano

# PHP et MySQL
RUN apt-get install -y php7.4 php7.4-fpm mysql-client

# Crée les dossiers où vont se trouver les sites html et php (index.html et index.php)
RUN mkdir -p /var/www/statique/
RUN mkdir -p /var/www/b2b/
RUN mkdir -p /var/www/intranet/

# Copie les codes sources des pages WEB dans les dossiers correspondants
COPY sites/www/index.html /var/www/statique/
COPY sites/b2b/index.php  /var/www/b2b/
COPY sites/intranet/index.php /var/www/intranet/

# Copie les configurations serveur dans les dossiers correspondants
COPY www.conf /etc/nginx/sites-available/
COPY b2b.conf /etc/nginx/sites-available/
COPY intranet.conf /etc/nginx/sites-available/

# Ajout d'un lien entre sites-enabled et site-available
RUN ln -s /etc/nginx/sites-available/www.conf /etc/nginx/sites-enabled/
RUN ln -s /etc/nginx/sites-available/b2b.conf /etc/nginx/sites-enabled/
RUN ln -s /etc/nginx/sites-available/intranet.conf /etc/nginx/sites-enabled/

# Ecoute sur le port 80
EXPOSE 80

# Cette directive va lancer le service php7.4-fpm et lancer le service nginx en foreground
CMD service php7.4-fpm start && nginx -g "daemon off;"
