#!/bin/bash

function alias_del_projet
{
	#Suppression de la ligne du projet si elle existe
	sed -i "/^contact@${name}/d" /etc/postfix/virtual

	#Compilation du fichier d'alias et redémarrage de postfix
	postmap /etc/postfix/virtual
	service postfix restart
}