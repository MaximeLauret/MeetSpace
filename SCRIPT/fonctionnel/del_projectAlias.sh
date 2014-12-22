#!/bin/bash

function del_projectAlias
{ 
	sed -i "/^contact@${name}/d" /etc/postfix/virtual

	postmap /etc/postfix/virtual
	service postfix restart
}
