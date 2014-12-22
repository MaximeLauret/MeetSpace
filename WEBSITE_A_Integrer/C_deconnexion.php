<!--
C_modele.php
fichier contrôleur modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php session_start(); ?>

<!-- Modèle -->
<?php include("M/M_deconnexion.php"); ?>

<?php // Lignes pour simuler des variables :-) ?>

<!--Contrôleur -->
<?php
//$bdd = connexion(); OSEF
 
// On test si on a reçu un POST
if(isset($_POST["deco"])) {
	$auto_refresh = deconnexion();
} else {	
	// RIEN
}

?>


<!-- Vue -->
<?php include("V/V_deconnexion.php"); ?>
