#!/bin/bash

user=$1
password=$2
#Ajout utilisateur postfix
	echo "$user@meetspace.itinet.fr $user/" >> /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	service postfix restart
	
#Création Maildir utilisateur
	if [ ! -r /var/mail/$user ]
		then
			mkdir /var/mail/$user
			chown vmail:vmail /var/mail/$user
			maildirmake /var/mail/$user/Maildir
			chown vmail:vmail /var/mail/$user/Maildir
	fi
#Création authentication IMAP
	userdb "$user@meetspace.itinet.fr" set home=/var/mail/$user/ mail=/var/mail/$user uid=1006 gid=1006
	userdbpw -md5 |userdb "$user@meetspace.itinet.fr" set imappw<< P1
$password
$password
P1
	makeuserdb