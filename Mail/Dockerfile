FROM ubuntu:latest
LABEL Mail="Mail Config"

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update 
RUN apt-get upgrade -y

# add a hostname to avoid nobody as mail recepient
RUN echo debian > /etc/hostname
ADD /config/etc-hosts.txt /etc/hosts

# preconfigure postfix 
RUN echo "postfix postfix/mail_mailer_type string Internet site" >> preseed.txt
RUN echo "postfix postfix/mailname string l1-2.ephec-ti.be" >> preseed.txt

# use mailbox format
RUN debconf-set-selections preseed.txt

# install postfix and dovecot
RUN apt-get install -q -y supervisor postfix dovecot-core dovecot-pop3d dovecot-imapd
RUN rm /etc/postfix/main.cf

#install s-nail to test mail
RUN apt-get install s-nail -y

# transfer Postfix and Dovecot configuration files
COPY /postfix/* /etc/postfix
COPY /dovecot/* /etc/dovecot

# Copy additional Postfix configuration files
COPY /config/bash.bashrc /etc/bash.bashrc
COPY /config/mail.sh /etc/profile.d/mail.sh
COPY /config/s-nail.rc /etc/s-nail.rc

# Reconfigure Postfix configuration
RUN postconf -e mail_spool_directory="/var/spool/mail"
RUN postconf -e mailbox_command=""

# configure debian to receive mail
RUN useradd -s /bin/bash concierge
RUN mkdir /var/spool/mail/debian
RUN chown concierge:mail /var/spool/mail/debian

ADD /config/run.sh /
ADD /config/etc-aliases.txt /etc/aliases
RUN chown root:root /etc/aliases
RUN newaliases

RUN mkdir /var/run/sshd
ADD /config/postfix.cf /postfix.cf.test
RUN cat /postfix.cf.test >> /etc/postfix/main.cf && rm /postfix.cf.test

# Enable ports for IMAP and POP3
# Enable port for SMTP (Postfix)
EXPOSE 25 587 143 993 110 995

# Start Postfix and Dovecot services

#RUN /etc/init.d/postfix start
#RUN /etc/init.d/dovecot start
CMD /run.sh;/usr/bin/supervisord -c /etc/supervisor/supervisord.conf
