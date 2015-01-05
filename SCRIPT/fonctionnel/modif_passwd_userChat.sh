#!/bin/bash

#Variables : Nom et Password utilisateur

/usr/bin/prosodyctl passwd $name@meetspace.itinet.fr <<-EOF
	$password
	$password
	EOF
/usr/bin/prosodyctl restart

