<!--
C_creer_un_tableau.php
Auteur : Valentin (le 16.04.14)
-->
<?php session_start(); ?>

<!-- Modèle -->
<?php 
include("M/M_create_board.php");

//Contrôleur

$bdd = connexion();


if(isset($_POST["action"])) {

	// si on a reçu un post, on créer notre magnifique tableau
	// Si il n'existe pas déjà et qu'il n'y a pas QUE des espaces bien sûr
	if( !exists_board_name($bdd, $_POST["create_board"]) && no_space($bdd, $_POST["create_board"]) ) {
		// On crée le tableau, et on l'abonne
		creer_tableau($bdd, $_POST["create_board"]);		
		abonner_gus($bdd, $_SESSION["user"], $_POST["create_board"] );
		$message = "Le tableau a bien été crée :-)";

	} else {
		// RIEN
		$message = "Erreur :(";
	}
	
} else {
	$message = "RIEN RECU pour le moment";
}


include("V/V_create_board.php"); 
?>
