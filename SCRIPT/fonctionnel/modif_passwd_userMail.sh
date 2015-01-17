#!/bin/bash

#Variables : Nom et Password utilisateur

password=$(sudo /usr/sbin/userdbpw -md5 <<-EOF
	$password
	$password
	EOF
	)
sudo /usr/sbin/userdb "$name@meetspace.itinet.fr" set imappw=$password 
sudo /usr/sbin/makeuserdb