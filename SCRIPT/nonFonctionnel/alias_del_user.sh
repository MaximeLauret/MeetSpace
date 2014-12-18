#!/bin/bash

projet=$1
user=$2

var=`grep "$projet@meetspace.itinet.fr" /etc/postfix/virtual`

sed -i "/${var}/d" /etc/postfix/virtual


if [[ $var = *$user* ]]
then
	#suppression de $user@meetspace.itinet.fr dans $var
	echo "$var" >> /etc/postfix/virtual
fi

postmap /etc/postfix/virtual
service postfix restart