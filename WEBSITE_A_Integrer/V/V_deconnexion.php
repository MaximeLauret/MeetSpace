<!--
V_modele.php
fichier vue modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<!DOCTYPE html >
<html>
<head>
<?php include("V/INCLUDE/header.php"); ?>
<?php
if(isset($auto_refresh)) {
	echo($auto_refresh);
} else {

}

?>
</head>
<body>
<?php include ("V/INCLUDE/entete.php"); ?>


<!-- Code Vue :D -->

<form action="#" method="POST">
	<input type="submit" name="deco" value="Déconnexion"/>
</form>

<?php include("V/INCLUDE/footer.php"); ?>
</body>
</html>