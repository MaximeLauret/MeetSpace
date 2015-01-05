#!/bin/bash

#Variables : Nom et Password utilisateur

if [ ! -e /var/lib/prosody/meetspace%2eitinet%2efr/accounts/$name ]
then
	/usr/bin/prosodyctl adduser $name@meetspace.itinet.fr <<-EOF
		$password
		$password
		EOF
	/usr/bin/prosodyctl restart
fi
