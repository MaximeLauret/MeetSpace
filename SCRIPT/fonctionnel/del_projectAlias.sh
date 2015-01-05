#!/bin/bash
# GUEZOU Guillaume - Gestion des alias
#Variable
name=$1

#Script

if (($#=="1"));then
	/bin/sed -i "/^contact@${name}/d" /etc/postfix/virtual
	/usr/sbin/postmap /etc/postfix/virtual
	/usr/bin/service postfix restart
else
	echo " del_projectAlias: Nombre de paramètres invalide "
fi

