FROM ubuntu:latest

MAINTAINER Mail "Mail Config"

# Install Postfix and Dovecot
RUN apt-get update && apt-get upgrade -y
RUN apt-get install postfix -y
RUN apt-get install dovecot-core dovecot-pop3d dovecot-imapd -y
RUN apt-get install mysql -y



EXPOSE 81


