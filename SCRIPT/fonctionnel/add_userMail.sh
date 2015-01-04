#!/bin/bash


#Ajout utilisateur postfix
	/bin/echo "$name@meetspace.itinet.fr $name/" >> /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	/usr/bin/service postfix restart

#Création Maildir utilisateur
	if [ ! -r /var/mail/$name ]
		then
			/bin/mkdir /var/mail/$name
			maildirmake /var/mail/$name/Maildir
			/bin/chown -R vmail:vmail /var/mail/$name
	fi

#Création authentication IMAP
	password=$(userdbpw -md5 <<-EOF
	$password
	$password
	EOF
	)
	userdb "$name@meetspace.itinet.fr" set imappw=$password home=/var/mail/$name/ mail=/var/mail/$name uid=1006 gid=1006 
	makeuserdb

#Initialisation du dossier principal de la boite mail
telnet mail.meetspace.itinet.fr 25 <<AUTO
mail from:<contact@meetspace.itinet.fr>
rcpt to:<$name@meetspace.itinet.fr>
data
Subject: Bienvenue sur Meetspace
L'équipe de Meetspace vous souhaite la bienvenue sur son site.
.
quit
AUTO
