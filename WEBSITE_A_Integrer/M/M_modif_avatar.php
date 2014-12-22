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


// Fct de vérification, on lui envoi le fichier à tester.
// Retourne false si il y a une erreur. Vrai si l'image est apparament conforme
function verif_img($fichier) {
	// Variables que l'on va tester :
	
	$taille_max = 5000000; // en octet -> 5Mo pour le moment
	// tailles en px
	$hauteur_min = 50;
	$hauteur_max = 500;
	$largeur_min = 50;
	$largeur_max = 500;
	
	$extension_ok = "image/png";
	
	// On regarde les éventuelles erreurs :
	if ($fichier["error"] > 0) {
		return false;
	} else {
		// RIEN
	}
	
	// On regarde ensuite la taille du fichier :
	if($fichier["size"] > $taille_max) {
		return false;
	} else {
		// RIEN
	}
	
	// On regarde l'extension du fichier
	if($fichier["type"] != $extension_ok) {
		return false;
	} else {
		// RIEN 
	}
	
	// Vérification de la definition de l'image
	$taille_img = getimagesize($fichier["tmp_name"]);
	if($taille_img[0] < $hauteur_min AND
		$taille_img[0] > $hauteur_max AND
		$taille_img[1] < $largeur_min AND
		$taille_img[1] > $largeur_max ) {
		return false;
	} else {
		// RIEN
	}
	
	return true;	
}


// Modifie l'avatar de la personne que l'on donne.
// 			Demande l'accès à la base de donnée,
// 			Le chemin de l'image 
//			l'utilisteur cible
function add_bdd($bdd, $path, $user) {
	$img = file_get_contents($path);
	$req = $bdd->prepare("UPDATE users SET avatar = :img WHERE id=:id_user");
	$req->execute( array( "img"=>$img, "id_user" => $user) );
}


?>