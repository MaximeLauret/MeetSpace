#!/bin/bash

user=projet2
password=tata

#Ajout utilisateur postfix
	echo "$user"+"@meetspace.itinet.fr $user/" > /etc/postfix/mailboxmap
	postmap mailboxmap
	service postfix restart
	
#Création Maildir utilisateur
	mkdir /var/mail/$user
	chown vmail:vmail /var/mail/$user
	maildirmake /var/mail/$user/Maildir
	chown vmail:vmail /var/mail/$user/Maildir
	
#Création authentication IMAP
	userdb "$user@meetspace.itinet.fr" set home=/var/mail/$user/ mail=/var/mail/$user uid=1006 gid=1006
	userdbpw -md5 | userdb "$user@meetspace.itinet.fr" set imappw
	echo "$password\n"
	echo "$password\n"
	makeuserdb