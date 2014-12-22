#!/bin/bash
#Pierrick VERAN
#Script permettant de supprimer le blog d'un projet

function del_blog
{ 
	rm -R /var/sftp/$name/www/*
}
