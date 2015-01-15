<!--
index.php
Controller for the index
Created by Max (2014-12-22)
-->


<?php
	session_start();
?>
	
<?php
	if (isset($_SESSION['ID'])) // SI L'UTILISATEUR EST CONNECTE
	 {
		if (isset($_GET['section'])) // ET SI ON A DES PARMS DANS L'URL
		{
			switch ($_GET['section']) { // ALORS ON SE BALADE SUR LE SITE
				case 'user':
					include_once ("./switchUser.php");
					break;
				case 'project':
					include_once ("./switchProject.php");
					break;
				default:
					include_once ("./C_myprojects.php"); // SI ON EST CONNECTE SANS BON PARMS: ON TOMBE SUR SA PAGE PERSO
			}
		}
		else
		{
			include_once ("./C_myprojects.php");// SI ON EST CONNECTE SANS PARMS: ON TOMBE SUR SA PAGE PERSO
		}
	 }
	else
	{
		#echo "Session Enabled but No Session values Created";
		include_once ("./C_public.php"); // SI ON EST PAS CONNECTE ON TOMBE SUR LA PAGE D'ACUEILLE
	}
?>

