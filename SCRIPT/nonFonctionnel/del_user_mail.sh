#!/bin/bash

user=maxime
#Suppression utilisateur
	#Retrait sur postfix
	sed -ie '/"user"/d' /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	service postfix reload
	
	#Retrait sur courier-IMAP
	sed -ie '/"user"/d' /etc/courier/userdb
	makeuserdb

	#Retrait du dossier mail utilisateur
	rm -r /var/mail/$user