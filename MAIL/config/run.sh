#!/bin/bash

if [[ -a /etc/supervisor/conf.d/supervisord.conf ]] 
then
  exit 0;
fi

cat > /etc/supervisor/conf.d/supervisord.conf <<EOF
[supervisord]
nodaemon=true

[program:postfix]
command=/opt/postfix.sh

[program:dovecot]
command=/usr/sbin/dovecot
EOF

#########
# postfix
#########
cat >> /opt/postfix.sh <<EOF
service postfix start
EOF
chmod +x /opt/postfix.sh