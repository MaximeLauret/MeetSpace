#!/bin/bash
# GUEZOU Guillaume - Gestion du mail(postfix)
#Suppression utilisateur

#Variable
name=$1

#Script
if (($#=="1"));then
	#Retrait sur postfix
	/bin/sed -i "/${name}/d" /etc/postfix/mailboxmap
	sudo /usr/sbin/postmap /etc/postfix/mailboxmap
	sudo /usr/sbin/service postfix reload

	#Retrait sur courier-IMAP
	/bin/sed -i "/${name}/d" /etc/courier/userdb
	sudo /usr/sbin/makeuserdb

	#Retrait du dossier mail utilisateur
	/bin/rm -r /var/mail/$name
else
	echo " del_userMail: Nombre de paramètre invalide "
fi