#!/bin/bash

user=maxime
#Suppression utilisateur
	#Retrait sur postfix
	sed -i '/^$user$/d' /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	service postfix restart
	
	#Retrait sur courier-IMAP
	sed -i '/^$user$/d' /etc/courier/userdb
	makeuserdb

	#Retrait du dossier mail utilisateur
	rm -r /var/mail/$user