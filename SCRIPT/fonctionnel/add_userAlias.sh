#!/bin/bash
# GUEZOU Guillaume - Gestion des alias
#Variable
projectName=$1
userName=$2

#Script


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

sudo /usr/sbin/postmap  /etc/postfix/virtual
sudo /usr/sbin/service postfix restart
