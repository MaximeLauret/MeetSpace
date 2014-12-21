#!/bin/bash
#Suppression utilisateur

function del_userMail
{ 
	#Retrait sur postfix
	sed -i "/${name}/d" /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	service postfix reload

	#Retrait sur courier-IMAP
	sed -i "/${name}/d" /etc/courier/userdb
	makeuserdb

	#Retrait du dossier mail utilisateur
	rm -r /var/mail/$name
}
