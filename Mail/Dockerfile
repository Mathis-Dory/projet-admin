FROM ubuntu:latest
LABEL Mail="Mail Config"

RUN apt-get update 
RUN apt-get upgrade -y

# add a hostname to avoid nobody as mail recepient
RUN echo debian > /etc/hostname
ADD etc-hosts.txt /etc/hosts

# install postfix
RUN echo "postfix postfix/mail_mailer_type string Internet site" >> preseed.txt
RUN echo "postfix postfix/mailname string l1-2.ephec-ti.be" >> preseed.txt

# use mailbox format
RUN debconf-set-selections preseed.txt
RUN DEBIAN_FRONTEND=noninteractive apt-get install -q -y postfix
RUN rm /etc/postfix/main.cf

#install s-nail to test mail
RUN apt-get install s-nail -y

# Copy Postfix configuration files
COPY config/main.cf /etc/postfix/main.cf
COPY config/virtual /etc/postfix/virtual
COPY config/bash.bashrc /etc/bash.bashrc
COPY config/mail.sh /etc/profile.d/mail.sh
COPY config/s-nail.rc /etc/s-nail.rc

# Reconfigure Postfix configuration
RUN postconf -e mail_spool_directory="/var/spool/mail"
RUN postconf -e mailbox_command=""

# add user to receive mail
RUN useradd -s /bin/bash concierge
RUN mkdir /var/spool/mail/concierge
RUN chown concierge:mail /var/spool/mail/concierge

ADD etc-aliases.txt /etc/aliases
RUN chown root:root /etc/aliases
RUN newaliases

# Enable port for SMTP (Postfix)
EXPOSE 25 587

# Install Dovecot
RUN apt-get install dovecot-core dovecot-pop3d dovecot-imapd -y

# Copy Dovecot configuration files
COPY config/dovecot.conf /etc/dovecot/dovecot.conf
COPY config/10-auth.conf /etc/dovecot/conf.d/10-auth.conf
COPY config/10-mail.conf /etc/dovecot/conf.d/10-mail.conf
COPY config/10-master.conf /etc/dovecot/conf.d/10-master.conf
COPY config/10-ssl.conf /etc/dovecot/10-ssl.conf
COPY config/directory /etc/dovecot/directory
COPY config/20-pop3.conf /etc/dovecot/20-pop3.conf

RUN mkdir /var/run/sshd
ADD dovecot.conf /etc/dovecot/conf.d/99-test.conf
ADD postfix.cf /postfix.cf.test
RUN cat /postfix.cf.test >> /etc/postfix/main.cf && rm /postfix.cf.test

# Enable ports for IMAP and POP3
EXPOSE 143 993 110 995

# Start Postfix and Dovecot services

#RUN /etc/init.d/postfix start
#RUN /etc/init.d/dovecot start
CMD ["/etc/init.d/postfix", "start", "&&", "/etc/init.d/dovecot", "start"]