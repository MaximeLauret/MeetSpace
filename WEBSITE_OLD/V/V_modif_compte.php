<!--
V_modele.php
fichier vue modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<!DOCTYPE html>
<html>
<?php include("V/INCLUDE/header.php"); ?>
<body>
<?php include ("V/INCLUDE/entete.php"); ?>


<!-- Ici le code du View :D -->
<form action="C_modif_compte.php" method="POST">
	<input type="text" name="pwd_old" value="" placeholder="Mot de Passe"/><br/>
	<input type="text" name="pwd_new" value="" placeholder="Nouveau Mot de Passe"/><br/>
	<input type="submit" name="action" value="Modifier"/><br/>
</form>

<?php
	if(isset($message)) {
		echo($message);
	} else {
		// RIEN
	}	
?>


<?php include("V/INCLUDE/footer.php"); ?>
</body>
</html>