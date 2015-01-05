#!/bin/bash

#Variables : Nom et Password utilisateur

password=$(/usr/sbin/userdbpw -md5 <<-EOF
	$password
	$password
	EOF
	)
/usr/sbin/userdb "$name@meetspace.itinet.fr" set imappw=$password 
/usr/sbin/makeuserdb