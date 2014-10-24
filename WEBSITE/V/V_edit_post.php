<!-- V modifier/supprimer un post-it
Par: THIBAUD Valentin
Le: 11/04/2014-->
<!DOCTYPE html >
<html>
<?php include("./V/INCLUDE/header.php"); ?>

<body>
<?php include ("./V/INCLUDE/entete.php"); ?>
<form action="#" method="POST">

	<!-- Modif titre -->
	<input type="text" name="new_title" value="" placeholder="Nouveau titre"/>
	<input type="submit" name="action" value="Modifier titre"/><br>

	
	<!-- Modif contenu -->
	<input type="text" name="new_message" value="" placeholder="Nouveau message"/>
	<input type="submit" name="action" value="Modifier message"/><br>

	<!-- SUPPR -->
	<input type="submit" name="action" value="Supprimer post"/>
	
</form>
<?php
include("./V/INCLUDE/footer.php");
?>
</body>
</html>