#!/bin/bash
# GUEZOU Guillaume - Gestion des alias
#Variable
userName=$1
projectName=$2
#Script

var=`/bin/grep "contact@$projectName" /etc/postfix/virtual`

/bin/sed -i "/${var}/d" /etc/postfix/virtual
/bin/echo "$var" > /etc/postfix/var.txt

if [[ $var = *$userName* ]]
then
	/bin/sed -i "s/\"${userName}@meetspace.itinet.fr\";//" /etc/postfix/var.txt
	var=$(</etc/postfix/var.txt)
	/bin/echo "$var" >> /etc/postfix/virtual
else
	/bin/echo "$var" >> /etc/postfix/virtual
fi

sudo /usr/sbin/postmap /etc/postfix/virtual
sudo /usr/sbin/service postfix restart
