#!/bin/bash

#Recherche de la ligne correspondant � : contact@$projet
#Recherche et Suppresion de la cha�ne de caract�re : $nom@meetspace.itinet.fr
postmap /etc/postfix/virtual
service postfix restart