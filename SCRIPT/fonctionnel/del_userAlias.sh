#!/bin/bash

function add_userAlias
{ 
	var=`grep "contact@$projectName" /etc/postfix/virtual`

	sed -i "/${var}/d" /etc/postfix/virtual
	echo "$var" > /etc/postfix/var.txt

	if [[ $var = *$userName* ]]
	then
		sed -i "s/\"${userName}@meetspace.itinet.fr\";//" /etc/postfix/var.txt
		var=$(</etc/postfix/var.txt)
		echo "$var" >> /etc/postfix/virtual
	fi

	postmap /etc/postfix/virtual
	service postfix restart
}
