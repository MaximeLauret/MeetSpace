<!--
C_modele.php
fichier contrôleur modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php session_start(); ?>
<!-- Modèle -->
<?php include("M/M_suppr_compte.php"); ?>

<!--Contrôleur -->
<?php
$bdd = connexion();

// Verif si tout est bien inscrit
if(isset($_POST["action"]) &&
	isset($_POST["pwd_old"]) &&
	pwd_ok($bdd, $_SESSION["user"], $_POST["pwd_old"] )) {

	if($_POST["action"] == "Supprimer Compte") {
		// Tout est bon, donc on supprime le compte du gus
		suppr_compte($bdd, $_SESSION["user"]);
		$message = "Compte bien supprimé :-)";
		
		// On supprime la session du gus
		session_unset();
		session_destroy();
		
		// Mise en place de l'auto-refresh
		$auto_refresh = "<meta http-equiv='Refresh' content='0; url=C_index.php'/>";
		
	} else {
		$message = "ERREUR, mauvais post['action'].";
	}
	
} else if(isset($_POST["action"]) &&
	isset($_POST["pwd_old"]) &&
	!pwd_ok($bdd, $_SESSION["user"], $_POST["pwd_old"] ) ) {
	
	$message = "Erreur de mot de passe.";
	
} else {
	// RIEN
	$message = "";
}

?>


<!-- Vue -->
<?php include("V/V_suppr_compte.php"); ?>