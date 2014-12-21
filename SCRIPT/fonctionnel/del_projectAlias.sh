#!/bin/bash

function del_projectAlias
{ 
	sed -i "/^${projet}/d" /etc/postfix/virtual

	postmap /etc/postfix/virtual
	service postfix restart
}
