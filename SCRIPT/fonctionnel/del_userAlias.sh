#!/bin/bash

var=`/bin/grep "contact@$projectName" /etc/postfix/virtual`

/bin/sed -i "/${var}/d" /etc/postfix/virtual
/bin/echo "$var" > /etc/postfix/var.txt

if [[ $var = *$userName* ]]
then
	/bin/sed -i "s/\"${userName}@meetspace.itinet.fr\";//" /etc/postfix/var.txt
	var=$(</etc/postfix/var.txt)
	/bin//bin/echo "$var" >> /etc/postfix/virtual
else
	echo "$var" >> /etc/postfix/virtual
fi

postmap /etc/postfix/virtual
/usr/bin/service postfix restart
