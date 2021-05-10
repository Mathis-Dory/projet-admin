#A partir d'une image ubuntu
FROM nginx

# Installation
RUN apt-get update
RUN apt-get install -y nano

#Copie l'html de notre dossier dans le container docker
COPY conf.d/www.conf /etc/nginx/conf.d/
COPY conf.d/b2b.conf /etc/nginx/conf.d/
COPY conf.d/intranet.conf /etc/nginx/conf.d/
COPY conf.d/default.conf /etc/nginx/conf.d/

#Spécifie sur quel numéro de port le container doit faire tourner le processus
EXPOSE 80 443

#précise qu'on veut que le serveur http run en background
CMD ["nginx", "-g", "daemon off;"]


# docker build -t nginx:latest .
# docker run --name nginx -p 80:80 -p 443:443 -d nginx

# docker run --name nginx -p 80:80 -p 443:443 -d mathisdory/projet-admin-2:nginx (vps)
#  docker run --name nginx -p 80:80 -p 443:443 -d nginx (local)
