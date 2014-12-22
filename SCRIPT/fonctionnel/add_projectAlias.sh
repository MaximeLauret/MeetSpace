#!/bin/bash


function add_projectAlias
{ 
	grep -on "contact@$name" /etc/postfix/virtual
	retval=$?

	if [ "$retval" != 0 ]
	then
	       echo "contact@$name" >> /etc/postfix/virtual
	fi

	postmap /etc/postfix/virtual
	service postfix restart
}
