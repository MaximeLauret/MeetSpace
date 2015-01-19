<!--
index.php
Controller for the index
Created by Max (2014-12-22)
-->


<?php
	if (isset($_GET['part'])) // ET SI ON A DES PARMS DANS L'URL
	{

		switch ($_GET['part']) { // ALORS ON SE BALADE SUR LE SITE
			case 'profil':
				echo "user --> profil";
				include_once ("./C_profile.php");
				break;
			case 'editProfil':
				echo "user --> editProfil";
				break;
			case 'logout':
				echo "user --> editProfil";
				break;
			default:
				include_once ("./C_myprojects.php"); // SI ON EST CONNECTE SANS BON PARMS: ON TOMBE SUR SA PAGE PERSO
		}
	}
	
	else
	{
		include_once ("./C_myprojects.php");
	}
?>

