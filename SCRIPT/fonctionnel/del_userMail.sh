#!/bin/bash
# GUEZOU Guillaume - Gestion du mail(postfix)
#Suppression utilisateur

#Variable
name=$1

#Script
#Retrait sur postfix
/bin/sed -i "/${name}/d" /etc/postfix/mailboxmap
sudo /usr/sbin/postmap /etc/postfix/mailboxmap
sudo /usr/sbin/service postfix reload

#Retrait sur courier-IMAP
/bin/sed -i "/${name}/d" /etc/courier/userdb
sudo /usr/sbin/makeuserdb

#Retrait du dossier mail utilisateur
/bin/rm -r /var/mail/$name
