#!/bin/bash
# GUEZOU Guillaume - Gestion des alias
#Variable
name=$1

#Script
/bin/sed -i "/^contact@${name}/d" /etc/postfix/virtual

/usr/sbin/postmap /etc/postfix/virtual
/usr/bin/service postfix restart
