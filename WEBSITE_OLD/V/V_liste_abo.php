<!--
V_modele.php
fichier vue modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
--><html>
<?php include("V/INCLUDE/header.php"); ?>
<body>
<?php include ("V/INCLUDE/entete.php"); ?><br>

<!--Affichage de tout les abonnements-->
<?php
	echo("Vous êtes abonné à : <br/>");

	foreach($array as $key => $value) {
		echo $array[$key]."<br/>";
	}

?>
<?php include("V/INCLUDE/footer.php"); ?>
</body>
</html>