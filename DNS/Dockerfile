
# Version Ubuntu

FROM ubuntu:20.04

# Installe bind9

RUN apt-get update
RUN apt-get install -y bind9
RUN apt-get install -y bind9utils

#Défini le répertoire dans lequel on travail

WORKDIR /etc/bind

#Monte un volume pour empêcher les modifications ultérieures et enregistrer les données

VOLUME ["/etc/bind"]

#On copie dans /etc/bind les fichiers que j'ai crée

COPY config/named.conf /etc/bind/named.conf
COPY config/named.conf.options /etc/bind/named.conf.options
COPY config/named.conf.default-zones /etc/bind/named.conf.default-zones
COPY config/named.conf.local /etc/bind/named.conf.local
COPY config/db.l1-2.ephec-ti.be /etc/bind/db.l1-2.ephec-ti.be

EXPOSE 53/tcp
EXPOSE 53/udp

#Lance le service bind9 

CMD ["/usr/sbin/named", "-g", "-c", "/etc/bind/named.conf", "-u", "bind"]

# docker build -t dns .
# docker tag dns mathisdory/projet-admin-2:dns
# docker run -tdp 53:53 -v "$(pwd)/config:/etc/bind" <image>

