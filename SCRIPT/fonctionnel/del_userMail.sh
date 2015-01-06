#!/bin/bash
# GUEZOU Guillaume - Gestion du mail(postfix)
#Suppression utilisateur

#Variable
name=$1

#Script
if (($#=="1"));then
	#Retrait sur postfix
	/bin/sed -i "/${name}/d" /etc/postfix/mailboxmap
	/usr/sbin/postmap /etc/postfix/mailboxmap
	/usr/sbin/service postfix reload

	#Retrait sur courier-IMAP
	/bin/sed -i "/${name}/d" /etc/courier/userdb
	/usr/sbin/makeuserdb

	#Retrait du dossier mail utilisateur
	/bin/rm -r /var/mail/$name
else
	echo " del_userMail: Nombre de paramètre invalide "
fi
