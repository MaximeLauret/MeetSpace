#!/bin/bash
# GUEZOU Guillaume - Gestion des alias
#Variable
userName=$1
projectName=$2
#Script
if (($#=="2"));then
	var=`/bin/grep "contact@$projectName" /etc/postfix/virtual`

	/bin/sed -i "/${var}/d" /etc/postfix/virtual
	/bin/echo "$var" > /etc/postfix/var.txt

	if [[ $var = *$userName* ]]
	then
		/bin/sed -i "s/\"${userName}@meetspace.itinet.fr\";//" /etc/postfix/var.txt
		var=$(</etc/postfix/var.txt)
		/bin//bin/echo "$var" >> /etc/postfix/virtual
	else
		/bin/echo "$var" >> /etc/postfix/virtual
	fi

	/usr/sbin/postmap /etc/postfix/virtual
	/usr/bin/service postfix restart
else
	echo " del_userAlias: Nombre de paramètres invalide "
fi
