FROM ubuntu:latest

MAINTAINER Mail "Mail Config"

# Install Postfix and Dovecot
RUN apt-get update && apt-get upgrade -y && apt-get install postfix -y && rm /etc/postfix/main.cf
RUN apt-get install s-nail -y
RUN apt-get install dovecot-core dovecot-pop3d dovecot-imapd -y

WORKDIR /etc/postfix
WORKDIR /etc/dovecot

VOLUME ["/etc/postfix"]
VOLUME ["/etc/dovecot"]

# Copy Postfix configuration files
COPY config/main.cf /etc/postfix/main.cf
COPY config/virtual /etc/postfix/virtual
COPY config/bash.bashrc /etc/bash.bashrc
COPY config/mail.sh /etc/profile.d/mail.sh
COPY config/s-nail.rc /etc/s-nail.rc

# Copy Dovecot configuration files
COPY config/dovecot.conf /etc/dovecot/dovecot.conf
COPY config/10-auth.conf /etc/dovecot/conf.d/10-auth.conf
COPY config/10-mail.conf /etc/dovecot/conf.d/10-mail.conf
COPY config/10-master.conf /etc/dovecot/conf.d/10-master.conf
COPY config/10-ssl.conf /etc/dovecot/10-ssl.conf
COPY config/directory /etc/dovecot/directory
COPY config/20-pop3.conf /etc/dovecot/20-pop3.conf

# Enable Ports
# for SMTP
EXPOSE 25 587
# for IMAP
EXPOSE 143 993
# for POP3
EXPOSE 110 995

# Start Postfix and Dovecot services
RUN /etc/init.d/postfix start
RUN /etc/init.d/dovecot start


