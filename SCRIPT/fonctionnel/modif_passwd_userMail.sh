#!/bin/bash

#Variables : Nom et Password utilisateur
name=$1
password=$2

password=$(sudo /usr/sbin/userdbpw -md5 <<-EOF
	$password
	$password
	EOF
	)
sudo /usr/sbin/userdb "$name@meetspace.itinet.fr" set imappw=$password 
sudo /usr/sbin/makeuserdb