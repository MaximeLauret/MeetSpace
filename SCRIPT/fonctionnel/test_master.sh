#!/bin/bash
#Test de Master

echo " add start .."

echo " 		Ajout d'un utilisateur"
./master.sh user add userTest3 userTest3

echo " 		Ajout d'un projet"
./master.sh project add userTest3

echo " 		Ajout d'un utilisateur de l'alias d'un projet"
./master.sh project alias add projetTest3 

echo " 		Ajout d'un utilisateur à l'alias d'un projet"
./master.sh project alias add projetTest3 userTest3


echo "		Activation du vhost du projet:"
./master.sh project vhost enable projetTest3
echo " ..end start"


echo " del "

echo " 		Suppresion d'un utilisateur"
./master.sh user del userTest3

echo " 		Suppresion d'un projet"
./master.sh project del userTest3

echo " 		Suppresion d'un utilisateur à l'alias d'un projet"
./master.sh project alias del projetTest3

echo "		Désactivation du vhost du projet:"
./master.sh project vhost disable projetTest3


