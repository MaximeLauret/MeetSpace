#!/bin/bash

#Variables : Nom et Password utilisateur

name=$1
password=$2

if [ ! -e /var/lib/prosody/meetspace%2eitinet%2efr/accounts/$name ]
then
	prosodyctl adduser $name@meetspace.itinet.fr <<-EOF
		$password
		$password
		EOF
	prosodyctl restart
fi
