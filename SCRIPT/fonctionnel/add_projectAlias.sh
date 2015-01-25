#!/bin/bash
# GUEZOU Guillaume - Gestion des alias
#Variable
name=$1

#Script
/bin/grep -on "contact@$name" /etc/postfix/virtual
retval=$?

if [ "$retval" != 0 ]
then
	   /bin/echo "contact@$name" >> /etc/postfix/virtual
fi

sudo /usr/sbin/postmap  /etc/postfix/virtual
sudo /usr/sbin/service postfix restart
