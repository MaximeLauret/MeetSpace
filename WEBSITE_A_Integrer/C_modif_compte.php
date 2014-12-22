<!--
C_modele.php
fichier contrôleur modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php session_start(); ?>
<!-- Modèle -->
<?php include("M/M_modif_compte.php"); ?>

<!--Contrôleur -->
<?php
$bdd = connexion();

// Verif si tout est bien inscrit
if(isset($_POST["action"]) &&
isset($_POST["pwd_old"]) &&
pwd_ok($bdd, $_SESSION["user"], $_POST["pwd_old"] )) {

	// Si le gus veut modifier le mot de passe
	if( $_POST["action"] == "Modifier") {
	
		// Si le nouveau mot de passe n'est pas vide, on fait la modif
		if($_POST["pwd_new"] != "") {
			modif_compte($bdd, $_SESSION["user"], $_POST["pwd_new"]);
			$message="Le mot de passe a bien été modifié ;)";
		} else {
			$message="Erreur, pas de nouveau mot de passe.";
		}
		
	} else {
		$message="Erreur, mauvaise action";
	}
// Si le mot de passe n'est pas correct
} else if(
	isset($_POST["action"]) &&
	isset($_POST["pwd_old"]) &&
	!pwd_ok($bdd, $_SESSION["user"], $_POST["pwd_old"] ) ) {
	
	$message = "Erreur mot de passe";

} else {
	$message="";
}
?>


<!-- Vue -->
<?php include("V/V_modif_compte.php"); ?>