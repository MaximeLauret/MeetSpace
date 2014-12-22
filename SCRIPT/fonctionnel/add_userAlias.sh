#!/bin/bash

function add_userAlias
{ 

	var=`grep "contact@$projectName" /etc/postfix/virtual`

	sed -i "/${var}/d" /etc/postfix/virtual

	if [[ $var != *$userName* ]]
	then
		if [[ $var = *\; ]]
		then
		        echo "$var\"$userName@meetspace.itinet.fr\";" >> /etc/postfix/virtual
		else
		        echo "$var \"$userName@meetspace.itinet.fr\";" >> /etc/postfix/virtual
		fi
	else
		echo "$var" >> /etc/postfix/virtual
	fi

	postmap /etc/postfix/virtual
	service postfix restart
}
