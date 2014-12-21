#!/bin/bash

function add_userAlias
{ 

	var=`grep "$projet@meetspace.itinet.fr" /etc/postfix/virtual`

	sed -i "/${var}/d" /etc/postfix/virtual

	if [[ $var != *$user* ]]
	then
		if [[ $var = *\; ]]
		then
		        echo "$var\"$user@meetspace.itinet.fr\";" >> /etc/postfix/virtual
		else
		        echo "$var \"$user@meetspace.itinet.fr\";" >> /etc/postfix/virtual
		fi
	else
		echo "$var" >> /etc/postfix/virtual
	fi

	postmap /etc/postfix/virtual
	service postfix restart
}
