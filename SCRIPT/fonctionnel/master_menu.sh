#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction affichage du menu 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function afficher_Menu
{ 
	echo "Outils d'administration du serveur meetspace

	Utilisation: 
	
	Gestion des utilisateurs:
	master user add [name] [password]
	master user del [name]

	Gestion des projets:
	master project add [name]
	master project del [name]

	Gestion des virtualhost du site de projet:
	master project vhost enable [name]
	master project vhost disable [name]

	Gestion des alias de la boite contact de projet:
	master project alias add [name]
	master project alias del [name]
	"



}
