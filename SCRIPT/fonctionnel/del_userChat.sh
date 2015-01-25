#!/bin/bash
# GUEZOU Guillaume - Gestion du chat(prosody)
#Variable
name=$1

#Script

if [ -e /var/lib/prosody/meetspace%2eitinet%2efr/accounts/$name.dat ]
then
	/usr/bin/prosodyctl deluser $name@meetspace.itinet.fr
	sudo /usr/bin/prosodyctl reload
fi
