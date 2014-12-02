#!/bin/bash

user=$1
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

password=$(userdbpw -md5 <<EOF
$2
$2
EOF
)
userdb "$user@meetspace.itinet.fr" set home=/var/mail/$user/ mail=/var/mail/$user uid=1006 gid=1006
userdb "$user@meetspace.itinet.fr" set imappw=$password
makeuserdb