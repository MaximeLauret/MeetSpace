#!/bin/bash
# GUEZOU Guillaume - Gestion du mail(postfix)
#Suppression utilisateur

#Variable
name=$1

#Script
#Retrait sur postfix
/bin/sed -i "/${name}/d" /etc/postfix/mailboxmap
/usr/sbin/postmap /etc/postfix/mailboxmap
/usr/bin/service postfix reload

#Retrait sur courier-IMAP
/bin/sed -i "/${name}/d" /etc/courier/userdb
/usr/sbin/makeuserdb

#Retrait du dossier mail utilisateur
/bin/rm -r /var/mail/$name
