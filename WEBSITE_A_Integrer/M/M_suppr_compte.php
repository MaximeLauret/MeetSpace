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

// Fct qui supprime l'enregistrement de la personne
function suppr_compte($bdd, $id) {	
	// Dès que un comment contient l'ID du mec, on remplace par 1
	$req = $bdd->prepare("UPDATE comments SET users = :new_id WHERE users = :old_id");
	$req->execute( array( "new_id" => 1 , "old_id" => $id));
	
	// Dès que un post contient l'ID du mec, on remplace par 1
	$req = $bdd->prepare("UPDATE posts SET nickname = :new_id WHERE nickname = :old_id");
	$req->execute( array( "new_id" => 1 , "old_id" => $id));
	
	// On enleve les contacts en sender
	$req = $bdd->prepare("DELETE FROM contacts WHERE sender=:old_id");
	$req->execute( array( "old_id" => $id));
	// On enleve les contacs en receiver
	$req = $bdd->prepare("DELETE FROM contacts WHERE receiver=:old_id");
	$req->execute( array( "old_id" => $id));
	
	// Dès que un abonnement contient l'ID du mec, on remplace par 1
	$req = $bdd->prepare("UPDATE subscribe SET users = :new_id WHERE users = :old_id");
	$req->execute( array( "new_id" => 1 , "old_id" => $id));
	
	// Et on peut enfin supprimer le gus \o/
	$req = $bdd->prepare("DELETE FROM users WHERE id = :id_user");
	$req->execute(array("id_user" => $id));
}

// Fct qui vérifie si le couple pseudo/mdp est correct
// Retourne True en cas de couple correct
function pwd_ok($bdd, $pseudo, $pwd) {
	$req = $bdd->prepare("SELECT PASSWORD FROM users WHERE id=:pseudo");
	$req->execute( array("pseudo" => $pseudo) );
	$ligne = $req->fetch();
	
	$req->closeCursor();
	
	if($ligne["PASSWORD"] == $pwd) {
		return true;
	} else {
		return false;
	}
}

?>