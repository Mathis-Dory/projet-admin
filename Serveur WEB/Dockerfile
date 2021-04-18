# Nous créons d'abord notre image à partir de l'image de base Ubuntu (version 18.04)
FROM ubuntu:18.04

# Nous allons utiliser la commande RUN pour mettre à jour tous les packages
RUN apt-get update
# Ensuite, nous utilisons la commande RUN pour installer apache2 sur notre image.
RUN apt-get install -y apache2
# Enfin, nous utilisons la commande RUN pour installer les packages utilitaires apache2 nécessaires sur notre image.
RUN apt-get install -y apache2-utils

# Cette commande va permettre de copier le fichier html dans le container docker
COPY site-web/index.html /var/www/html

# La commande EXPOSE est utilisée pour exposer le port 80 d'Apache dans le conteneur à l'hôte Docker.
EXPOSE 80

# Utilisation frontend apache2
ENTRYPOINT ["apache2ctl"]

# Enfin, la commande CMD est utilisée pour exécuter apache2 en arrière-plan.
CMD ["-DFOREGROUND"]

# Sources :
# https://www.ctl.io/developers/blog/post/dockerfile-entrypoint-vs-cmd/
# https://www.tutorialspoint.com/docker/building_web_server_docker_file.htm
# https://www.geeksforgeeks.org/how-to-build-a-web-server-docker-file/
# https://www.youtube.com/watch?v=okw7fOYHSeI
# https://www.youtube.com/watch?v=EGWW7_eCeKA
