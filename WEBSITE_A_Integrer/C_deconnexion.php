<!--
C_logout.php
Controller for the log out function
Created by Max (2015-01-07)
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
