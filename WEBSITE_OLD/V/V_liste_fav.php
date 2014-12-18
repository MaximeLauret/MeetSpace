<!--
V_modele.php
fichier vue modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<!DOCTYPE html>
<html>
<?php include("header.php"); ?>
<body>
<?php include ("entete.php"); ?>

<p>Voici la liste des favoris :-) (On ne donne que les ID pour le moment)</p>
<?php
	foreach($array as $key=>$value) {
		echo($array[$key]."<br/>");
	}
	
?>




<?php include("footer.php"); ?>
</body>
</html>