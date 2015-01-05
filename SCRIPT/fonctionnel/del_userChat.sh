#!/bin/bash

#Variables : Nom

if [ -e /var/lib/prosody/meetspace%2eitinet%2efr/accounts/$name ]
then
	/usr/bin/prosodyctl deluser $name@meetspace.itinet.fr
	/usr/bin/prosodyctl restart
fi
