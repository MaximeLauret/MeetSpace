#!/bin/bash
# GUEZOU Guillaume - Gestion du chat(prosody)
#Variable
name=$1

#Script

if (($#=="1"));then	
	if [ -e /var/lib/prosody/meetspace%2eitinet%2efr/accounts/$name.dat ]
	then
		/usr/bin/prosodyctl deluser $name@meetspace.itinet.fr
		/usr/sbin/prosodyctl reload
	fi
else
	echo " del_userChat: Nombre de paramêtre invalide "
fi
