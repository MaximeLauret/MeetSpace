#!/bin/bash

#Recherche de la ligne correspondant à : contact@$projet
#Recherche et Suppresion de la chaîne de caractère : $nom@meetspace.itinet.fr
postmap /etc/postfix/virtual
service postfix restart