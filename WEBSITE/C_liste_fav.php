<!--
C_modele.php
fichier contrôleur modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php session_start(); ?>
<!-- Modèle -->
<?php include("M/M_liste_fav.php"); ?>

<!--Contrôleur -->
<?php 

$_SESSION["user"] = 2;	// Je suis Chef :D

?>

<?php
$bdd = connexion();
$array = liste_favoris($bdd, $_SESSION["user"]);
?>


<!-- Vue -->
<?php include("V/V_liste_fav.php"); ?>