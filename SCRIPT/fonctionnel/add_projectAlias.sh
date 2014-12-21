#!/bin/bash


function add_projectAlias
{ 
	grep -on "$projet@meetspace.itinet.fr" /etc/postfix/virtual
	retval=$?

	if [ "$retval" != 0 ]
	then
	       echo "$projet@meetspace.itinet.fr" >> /etc/postfix/virtual
	fi

	postmap /etc/postfix/virtual
	service postfix restart
}
