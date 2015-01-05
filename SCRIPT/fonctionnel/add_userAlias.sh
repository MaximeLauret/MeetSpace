#!/bin/bash
# GUEZOU Guillaume - Gestion des alias
#Variable
userName=$1
projectName=$2

#Script

if (($#=="2"));then
	
	var=`/bin/grep "contact@$projectName" /etc/postfix/virtual`

	/bin/sed -i "/${var}/d" /etc/postfix/virtual

	if [[ $var != *$userName* ]]
	then
		if [[ $var = *\; ]]
		then
				/bin/echo "$var\"$userName@meetspace.itinet.fr\";" >> /etc/postfix/virtual
		else
				/bin/echo "$var \"$userName@meetspace.itinet.fr\";" >> /etc/postfix/virtual
		fi
	else
		/bin/echo "$var" >> /etc/postfix/virtual
	fi

	/usr/sbin/postmap  /etc/postfix/virtual
	/usr/bin/service postfix restart
else
	echo " add_userAlias: Nombre de paramètres invalide "
fi


