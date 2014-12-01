#!/bin/bash

user=projet4
#Suppression utilisateur
	#Retrait sur postfix
	sed '/$user/d' /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	service postfix restart
	
	#Retrait sur courier-IMAP
	sed '/$user@meetspace.itinet.fr/d' /etc/courier/userdb
	makeuserdb

	#Retrait du dossier mail utilisateur
	rm -r /var/mail/$user