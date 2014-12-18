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
<?php
// L'auto-refresh vers l'index vu que le gus est déco
if(isset($auto_refresh)) {
	echo($auto_refresh);
}
?>
<body>
<?php include ("V/INCLUDE/entete.php"); ?>



<!-- Ici le code du View :D -->
<form action="C_suppr_compte.php" method="POST">
	<input type="text" name="pwd_old" value="" placeholder="Mot de Passe"/><br/>
	<input type="submit" name="action" value="Supprimer Compte"/><br/>
</form>

<?php
// Le petit message pour dire que le mec a bien été déco
if(isset($message)) {
	echo($message);
} else {
	// RIEN
}
?>



<?php include("V/INCLUDE/footer.php"); ?>
</body>
</html>