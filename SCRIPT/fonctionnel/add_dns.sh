#!/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

name=$1
/bin/echo " Ajout de la ligne:"
/bin/echo "+$name.meetspace.itinet.fr:88.177.168.133:86400"
/bin/echo "+$name.meetspace.itinet.fr:88.177.168.133:86400" >> /etc/tinydns/root/data
/usr/bin/make /etc/tinydns/root/
