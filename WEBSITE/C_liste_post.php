<!--
C_tab.php
Page principale, vu du tableau que l'on choisit
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php session_start(); ?>
<!-- Modèle -->
<?php include("M/M_tab.php"); ?>

<!--Contrôleur -->
<?php
$bdd = connexion();

// Si on a reçu un GET, on affiche la page demandé (si le mec à le droit)
// Sinon on affiche son "fil d'actualité"
$_GET["tab"] = 1;

if( isset( $_GET["tab"] ) AND verif($bdd, $_SESSION["user"], $_GET["tab"] )) {
	$post = list_post($bdd, $_GET["tab"]);
} else {
	$post = actualite($bdd, $_SESSION["user"]);
}

// Dans tout les cas, on fait la liste des favoris du gus
$liste_fav = list_fav($bdd, $_SESSION["user"]);

?>


<!-- Vue -->
<?php include("V/V_tab.php"); ?>