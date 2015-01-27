#!/bin/bash
# GUEZOU Guillaume - Gestion du mail (postfix)
#Variable
name=$1
password=$2

#Script

#Ajout utilisateur postfix
/bin/grep "$name@meetspace.itinet.fr" /etc/postfix/mailboxmap

if [ $? == 1 ]
then
	sudo /bin/echo "$name@meetspace.itinet.fr $name/" >> /etc/postfix/mailboxmap
	sudo /usr/sbin/postmap  /etc/postfix/mailboxmap
	sudo /usr/sbin/service postfix restart
else
	/bin/echo "L'utilisateur existe déjà"
fi

#Création Maildir utilisateur
if [ ! -r /var/mail/$name ]
	then
		/bin/mkdir /var/mail/$name
		/usr/bin/maildirmake /var/mail/$name/Maildir
		/bin/chown -R vmail:vmail /var/mail/$name
fi

#Création authentication IMAP
password=$(sudo /usr/sbin/userdbpw -md5 <<-EOF
$password
$password
EOF
)
sudo /usr/sbin/userdb "$name@meetspace.itinet.fr" set imappw=$password home=/var/mail/$name/ mail=/var/mail/$name uid=1006 gid=1006 
sudo /usr/sbin/makeuserdb

#Initialisation du dossier principal de la boite mail
#	/usr/bin/telnet mail.meetspace.itinet.fr 25 <<-AUTO
#	mail from:<contact@meetspace.itinet.fr>
#	rcpt to:<$name@meetspace.itinet.fr>
#	data
#	Subject: Bienvenue sur Meetspace
#	L'équipe de Meetspace vous souhaite la bienvenue sur son site.
#	.
#	quit
#	AUTO