<!--
C_modele.php
fichier contrôleur modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php session_start(); ?>
<!DOCTYPE html >
<html>
<body>

<!-- Modèle -->
<?php include("M/M_liste_abo.php"); ?>

<!--Contrôleur -->
<?php
$bdd = connexion();
$array = liste_abonnement($bdd, $_SESSION["user"]);

?>


<!-- Vue -->
<?php include("V/V_liste_abo.php"); ?>
</body>
</html>