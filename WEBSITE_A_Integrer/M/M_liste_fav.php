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

// Fct qui donne la liste des 9 premiers favoris
function liste_favoris($bdd, $user) {
	// La variable que l'on va renvoyer
	$array = array();
	
	// On prepare la requête et on la lance
	$response = $bdd->prepare("SELECT boards FROM subscribe WHERE users = :id_user ORDER BY id ASC LIMIT 0,9");
	$response->execute( array( "id_user" => $user ) );
	
	// On traite la réponse
	for($i=0; $i<9; $i++) {
		$ligne = $response->fetch();
		if($ligne) {
			array_push($array, $ligne["boards"]);
		} else {
			// Si il n'y a pas de réponse
			array_push($array, "#");
		}
	}
	$response->closeCursor();
	// Et c'est bon on renvoie le tableau
	return $array;
}

?>