#!/bin/bash

#Variables : Nom et Password utilisateur
name=$1
password=$2

/usr/bin/prosodyctl passwd $name@meetspace.itinet.fr <<-EOF
	$password
	$password
	EOF
/usr/bin/prosodyctl restart

