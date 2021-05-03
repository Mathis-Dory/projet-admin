FROM ubuntu:latest

MAINTAINER Mail "Mail Config"

RUN apt-get update && apt-get upgrade -y

RUN apt-get install postfix -y

RUN apt-get install dovecot-core dovecot-pop3d dovecot-imapd -y

EXPOSE 81


