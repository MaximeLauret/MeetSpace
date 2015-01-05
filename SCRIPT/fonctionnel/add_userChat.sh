#!/bin/bash
# GUEZOU Guillaume - Gestion du chat (prosody)
#Variable
name=$1
password=$2

#Script

if (($#=="2"));then
	
	if [ ! -e /var/lib/prosody/meetspace%2eitinet%2efr/accounts/$name ]
	then
		/usr/bin/prosodyctl adduser $name@meetspace.itinet.fr <<-EOF
			$password
			$password
			EOF
		/usr/bin/prosodyctl restart
	fi
else
	echo " add_userChat: Nombre de paramètres invalide "
fi

