<!--
index.php
Controller for the index
Created by Max (2014-12-22)
-->

<?php if (!isset($_SESSION)) { session_start();} //Démarrage de la session ?> 


<?php include_once ("./M/OBJECT/User.class.php"); /* Inclusion de la class User */?>
<?php include_once ("./M/OBJECT/Project.class.php"); /* Inclusion de la class User */?>
	
<?php
	if (isset($_SESSION['ID'])) // SI L'UTILISATEUR EST CONNECTE
	 {
 		//S'il est connecté l'objet est initialiser gbackground-color: #222;
  border-color: #080808;
}râce à son ID
		$user= new User($_SESSION['ID']);
		$project= new Project(false);
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
					include_once ("./M/OBJECT/Search.class.php");
					$search= new Search();// Création de l'objet qui permet de faire les recherches
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

