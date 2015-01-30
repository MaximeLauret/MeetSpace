<!--
index.php
Controller for the index
Created by Max (2014-12-22)
-->


<?php
	if (isset($_GET['part'])) // ET SI ON A DES PARMS DANS L'URL
	{
		switch ($_GET['part']) { // ALORS ON SE BALADE SUR LE SITE
				
			case 'project':
				include_once ("./C_project.php"); // PAR DEFAULT IL TOMBE SUR LA PAGE DU PROJET
				break;
			case 'joinproject':
				include_once ("./C_joinproject.php"); // PAR DEFAULT IL TOMBE SUR LA PAGE DU PROJET
				break;
			case 'quitproject':
				include_once ("./C_quitproject.php"); // PAR DEFAULT IL TOMBE SUR LA PAGE DU PROJET
				break;

			default:
				include_once ("./C_project.php"); // PAR DEFAULT IL TOMBE SUR LA PAGE DU PROJET
		}
	}
		
	else
	{
		include_once ("./C_project.php");
	}
?>

