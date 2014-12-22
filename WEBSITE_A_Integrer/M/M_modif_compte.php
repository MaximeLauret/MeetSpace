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

// Fct qui vérifie si le couple pseudo/mdp est correct
// Retourne True en cas de couple correct
function pwd_ok($bdd, $id, $pwd) {
	$req = $bdd->prepare("SELECT password FROM users WHERE id=:id_user");
	$req->execute( array("id_user" => $id) );
	$ligne = $req->fetch();
	
	$req->closeCursor();
	
	if($ligne["password"] == $pwd) {
		return true;
	} else {
		return false;
	}
}

//Fct qui modifie le mdp de la personne
function modif_compte($bdd, $id_user, $new_password) {
	$req = $bdd->prepare("UPDATE users SET password =:new_pwd WHERE id=:id_user");
	$req->execute( array("new_pwd"=>$new_password, "id_user" => $id_user));	
}


?>