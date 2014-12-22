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

<?php
echo("
<p>Voici votre avatar actuel :<img src='./V/INCLUDE/img.php?id_img=".$_SESSION["user"]."'/></p>
");
?>
<p>Veuillez fournir votre avatar</p>
<form action="#" method="POST" enctype="multipart/form-data">	
	<input type="file" name="avatar"/><br/>
	<input type="submit" name="Submit" value="Submit" />
</form>

<?php
	if(isset($message)) {
		echo($message);
	}
?>




<?php include("V/INCLUDE/footer.php"); ?>
</body>
</html>