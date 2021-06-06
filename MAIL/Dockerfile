FROM ubuntu:latest
LABEL Mail="Mail Config"

RUN apt-get update 
RUN apt-get upgrade -y

###########
# POSTFIX #
###########

# add a hostname to avoid nobody as mail recepient
RUN echo mail.l1-2.ephec-ti.be > /etc/hostname
ADD /config/etc-hosts.txt /etc/hosts

# preconfigure postfix 
RUN echo "postfix postfix/mail_mailer_type string Internet site" >> preseed.txt
RUN echo "postfix postfix/mailname string l1-2.ephec-ti.be" >> preseed.txt

# use mailbox format
RUN debconf-set-selections preseed.txt

# install postfix and dovecot
RUN apt-get install -q -y postfix mailutils
COPY /postfix/* /etc/postfix

# configure debian to receive mail
RUN useradd -s /bin/bash concierge
RUN mkdir /var/spool/mail/concierge
RUN chown concierge:mail /var/spool/mail/concierge

ADD /config/etc-aliases.txt /etc/aliases
RUN chown root:root /etc/aliases
RUN newaliases

EXPOSE 25

###########
# DOVECOT #
###########

EXPOSE 80 443 587 465 473 993 110 995

#RUN apt install -y certbot python3-certbot-nginx
#COPY /nginx/* /etc/nginx
#RUN certbot certonly -a nginx --agree-tos --no-eff-email --staple-ocsp --email g.cruz@students.ephec.be -d mail.l1-2.ephec-ti.be

RUN apt install -y dovecot-core dovecot-imapd dovecot-pop3d dovecot-lmtpd

COPY /dovecot/* /etc/dovecot

RUN adduser dovecot mail

#RUN mkdir -p /etc/systemd/system/dovecot.service.d/
#RUN cp /config/restart.conf /etc/systemd/system/dovecot.service.d

CMD ["sh","-c","postfix start-fg", "dovecot start-fg"]