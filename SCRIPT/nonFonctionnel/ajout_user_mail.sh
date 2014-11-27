#!/bin/bash
user=projet3
password=toto

#Ajout utilisateur postfix
	echo "$user@meetspace.itinet.fr $user/" > /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	service postfix restart
	
#Création Maildir utilisateur
	if [test -r /var/mail$user]
		then
		else
			mkdir /var/mail/$user
			chown vmail:vmail /var/mail/$user
			maildirmake /var/mail/$user/Maildir
			chown vmail:vmail /var/mail/$user/Maildir
	fi
#Création authentication IMAP
	userdb "$user@meetspace.itinet.fr" set imappw=$password home=/var/mail/$user/ mail=/var/mail/$user uid=1006 gid=1006
	makeuserdb