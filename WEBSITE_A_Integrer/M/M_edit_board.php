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

// Fct qui récupère le titre de la table
// Demande l'accès à la BDD et l'ID de la table en question
function get_tab_titre($bdd, $tab) {
	// Variables
	$titre = "";
	// On fait la requête
	$req = $bdd->prepare("SELECT board_name FROM boards WHERE id=:tab");
	$req->execute( array( "tab"=>$tab) );
	// On récupère le titre du tableau
	$donnees = $req->fetch();
	$titre = $donnees["board_name"];
	// Et on renvoi le tout :D
	return $titre;
}

// Fct qui récupère la liste des abonnées au tableau
// Et qui donne le statut
// Demande l'accès à la BDD et l'ID de la table en question
function get_tab_abonne($bdd, $tab) {
	// Variable
	$liste_abonne = array();
	$i=0;
	
	// On fait notre petite requête SQL
	$req = $bdd->prepare("SELECT u.id, u.nickname, s.permission, s.id as sub_id
								FROM subscribe s
								LEFT JOIN users u ON u.id = s.users
								WHERE boards = :tab");
	$req->execute( array("tab"=>$tab) );
	
	// On formate notre tableau de sorti
	for($i=0; $donnee = $req->fetch(); $i++) {
		$liste_abonne[$i]["user_id"] = $donnee["id"];
		$liste_abonne[$i]["user_pseudo"] = $donnee["nickname"];
		$liste_abonne[$i]["user_permission"] = $donnee["permission"];
		$liste_abonne[$i]["sub_id"] = $donnee["sub_id"];
	}
	
	return $liste_abonne;
}


// Fct qui modifie la permission de la personne cité
// Demande l'accès à la BDD, l'ID de la ligne de l'abonnement, et la nouvelle valeur à mettre
function set_new_permission($bdd, $sub, $new_permission) {
	$req = $bdd->prepare("UPDATE subscribe 
							SET permission = :new_permission
							WHERE id= :sub_id");
	$req->execute( array( "new_permission"=>$new_permission , "sub_id" => $sub) );
}


// Fct qui supprime l'abonnement au gus
function delete_abo($bdd, $sub) {
	$req = $bdd->prepare("DELETE FROM subscribe WHERE id=:sub_id");
	$req->execute( array( "sub_id"=>$sub ) );
}


// Fct qui récupère la liste des contacts que l'on peut ajouter
function get_list_contact($bdd, $user) {
	// Variables
	$liste_contact = array();
	$i=0;
	// Petite requête SQL comme on les aimes :D
	$req = $bdd->prepare("SELECT u_s.nickname as sender_nickname, u_s.id as sender_id, u_r.nickname as receiver_nickname, u_r.id as receiver_id
								FROM contacts c
								LEFT JOIN users u_s ON c.sender = u_s.id
								LEFT JOIN users u_r ON c.receiver = u_r.id
								WHERE c.SENDER = :id_user OR c.receiver = :id_user
								");	
	$req->execute( array( "id_user"=>$user ) );
	
	// On tri les infos et on les places dans la liste de contacts
	for($i=0; $donnees = $req->fetch(); $i++) {
		array_push($liste_contact, array() );
		// On détermine qui est la bonne personne à ajouter
		if( $donnees["sender_id"] != $user ) {
			$liste_contact[$i]["contact_id"] = $donnees["sender_id"];
			$liste_contact[$i]["contact_nickname"] = $donnees["sender_nickname"];
		} else {
			$liste_contact[$i]["contact_id"] = $donnees["receiver_id"];
			$liste_contact[$i]["contact_nickname"] = $donnees["receiver_nickname"];
		}
		
	}
	
	return $liste_contact;
}

// Fct qui renvoi un bool disant si oui ou non le mec est abonné au tableau mentionné
// Demande l'accès a la BDD, l'ID de la personne et l'ID du tableau à tester
function test_abo($bdd, $user, $tab) {
	// Petite Requête SQL pour tester s'il y a des données
	$req = $bdd->prepare("SELECT * 
								FROM subscribe
								WHERE users = :id_user AND boards = :tab");
	$req->execute( array( "id_user"=>$user, "tab"=>$tab ) );
	$donnees = $req->fetch();
	$req->closeCursor();
	// Et on test si on a une réponse
	if( empty($donnees) ) {
		return false;
	} else {
		return true;
	}
	
}

// Fct qui ajoute les abonnements qu'on demande. 
// Demande l'accès à la BDD, la liste de personne (ID) ainsi que le tableau cible
function add_sub($bdd, $liste, $tab) {

	$i=0;
	for($i=0; isset($liste[$i]); $i++) {
		$req = $bdd->prepare("insert into subscribe values ('', :user, :tab, 'visitor', 0)");
		$req->execute( array( "user"=>$liste[$i], "tab"=>$tab ) );
		$req->closeCursor();
	}

}

?>