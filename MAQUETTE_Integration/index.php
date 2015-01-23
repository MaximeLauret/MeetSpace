<!--
index.php
Controller for the index
Created by Max (2014-12-22)
-->


<?php include_once ("./M/OBJECT/User.class.php"); /* Inclusion de la class User */?>


<?php if (!isset($_SESSION)) { session_start(); var_dump($_SESSION);} //Démarrage de la session ?> 
	
<?php
	if (isset($_SESSION['ID'])) // SI L'UTILISATEUR EST CONNECTE
	 {
 		//S'il est connecté l'objet est initialiser grâce à son ID
		$user= new User($_SESSION['ID']);
		/*var_dump($user[$_SESSION['ID']]);
		var_dump($user[$_SESSION['ID']]->get('ID'));
		var_dump($user[$_SESSION['ID']]->get('NICKNAME'));
		var_dump($user[$_SESSION['ID']]->get('PASSWORD'));
		var_dump($user[$_SESSION['ID']]->get('MAIL'));*/

		if (isset($_GET['section'])) // ET SI ON A DES PARMS DANS L'URL
		{
			switch ($_GET['section']) { // ALORS ON SE BALADE SUR LE SITE
				case 'user':
					include_once ("./SWITCH/switchUser.php");
					break;
				case 'project':
					include_once ("./SWITCH/switchProject.php");
					break;
				case 'search':
					include_once("./C_search.php"); //ON INCLUS LA FONCTION DE RECHERCHE
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
		$user = new User(FALSE);
		include_once ("./C_public.php"); // SI ON EST PAS CONNECTE ON TOMBE SUR LA PAGE D'ACUEILLE
	}
?>

