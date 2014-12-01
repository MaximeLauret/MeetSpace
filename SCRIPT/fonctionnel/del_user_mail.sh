#!/bin/bash

user=$1
#Suppression utilisateur
	#Retrait sur postfix
	sed -i "/${user}/d" /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	service postfix reload

	#Retrait sur courier-IMAP
	sed -i "/${user}/d" /etc/courier/userdb
	makeuserdb

	#Retrait du dossier mail utilisateur
	rm -r /var/mail/$user
