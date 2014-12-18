#!/bin/bash

projet=$1
user=$2

var=`grep "$projet@meetspace.itinet.fr" /etc/postfix/virtual`

#sed -i "/${var}/d" /etc/postfix/virtual
echo "$var" >> /etc/postfix/var.txt

if [[ $var = *$user* ]]
then
	sed "/\"${projet}@meetspace.itinet.fr\";/d" /etc/postfix/var.txt
	var=`cat /etc/postfix/var.txt`
	echo "$var" >> /etc/postfix/virtual
fi

postmap /etc/postfix/virtual
service postfix restart