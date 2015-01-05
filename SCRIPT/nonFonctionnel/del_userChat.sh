#!/bin/bash

#Variables : Nom

name=$1

if [ -e /var/lib/prosody/meetspace%2eitinet%2efr/accounts/$name ]
then
	prosodyctl deluser $name@meetspace.itinet.fr
	prosodyctl restart
fi
