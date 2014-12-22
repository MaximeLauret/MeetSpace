<!--
M_modele.php
fichier modèle modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php
function connexion() {
	/* Connexion à la BDD */
	try {
	$bdd = new PDO('mysql:host=localhost;dbname=notepost', 'root', '');
	} catch (Exception $e) {
		die("Erreur : ".$e->getMessage());
	}
	return $bdd;
}

function liste_abonnement($bdd, $pseudo){
	// Variables
	$array = array();
	
	// Recuperation ID du gus
	/*$response = $bdd->prepare("SELECT id FROM users WHERE nickname LIKE :pseudo");
	$response->execute( array( "pseudo"=>$pseudo ) );
	$id = $response->fetch();
	$id = $id["id"];
	$response->closeCursor();*/

	
	// Requete pour chercher la liste d'abonnement
	$response = $bdd->prepare("SELECT b.board_name
							FROM subscribe s JOIN users u
							ON s.users = u.ID
							JOIN boards b 
							ON b.ID = s.boards
							WHERE u.ID = :pseudo;");
							
	$response->execute( array( "pseudo" => $pseudo ) );
	while ($data = $response->fetch()) {
		array_push($array, $data["board_name"]);
	}					
	$response->closeCursor();
	return $array;
}


?>