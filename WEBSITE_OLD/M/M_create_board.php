<!--
M_creer un tableau.php
Auteur : Valentin (le 16.04.14)
-->
<?php

function connexion(){

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=notepost', 'root', '');
			
	} catch (Exception $e) {
		die("Erreur : ".$e->getMessage());
	}
	return $bdd;
}

/* Creer un tableau*/
function creer_tableau($bdd,$create_board){	
	
	// On envoie la requête pour créer le tableau en mode public	
	$rep = $bdd->prepare('INSERT INTO boards VALUES 	("", :create_board, "1")');
	$rep->execute ( array("create_board" => $create_board));
	
}

// Fct qui vérifie si le titre du tableau ne contient pas QUE des espaces
function no_space($bdd, $create_board){
	if($create_board[0] == " ") {
		return false;
	} else {
		return true;
	}
		
}

// Fct qui vérifie s'il existe déjà un tableau qui a le même nom
function exists_board_name($bdd, $create_board){

	$board_name = false;
		
	$reponse = $bdd->prepare('SELECT board_name FROM boards');
	$reponse->execute();
	
	while($donnees = $reponse->fetch()) {
		if($donnees['board_name'] === $create_board) {
			$board_name = true;
		} else {
			// RIEN
		}
	}
	return $board_name;
}

// Fct qui abonne le mec à un tableau avec le niveau admin
function abonner_gus($bdd, $user, $tableau) {
	
	// On recherche le numero du tableau
	$req = $bdd->prepare("SELECT id FROM boards WHERE board_name LIKE :tableau");
	$req->execute( array( "tableau"=>$tableau ) );
	$id = $req->fetch();
	$id = $id["id"];
	$req->closeCursor();
	
	// On prépare la requête, et on abonne le gars à son tableau
	$req = $bdd->prepare("INSERT INTO subscribe values( '', :user, :board, 'admin',0 )");
	$req->execute( array( "user"=>$user, "board"=>$id ) );
	$req->closeCursor();
	
}



?> 

