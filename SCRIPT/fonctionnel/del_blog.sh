#!/bin/bash
#Pierrick VERAN
#Script permettant de supprimer le blog d'un projet
#Variables
name=$1

#Script
/bin/rm -R /var/sftp/$name/www/*
