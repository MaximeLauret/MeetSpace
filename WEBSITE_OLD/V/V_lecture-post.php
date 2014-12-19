<!--
V_lecture-post.php
fichier vue modèle
Auteur : Mike Tyson (le 5.05.14)
MaJ : ---
-->
<!DOCTYPE html>
<html>
<?php include("V/INCLUDE/header.php"); ?>

<body>
<?php include ("V/INCLUDE/entete.php"); ?>

<!-- Ici le code du View :D -->
<?php		
	echo("<br/>");
	for($i = 0; $i < count($array_aux); $i++) {
		foreach($array_aux[$i] as $key => $value) {
			echo "$key : "."$value</br>";
		}
		
		echo "<br/>";
	}
	
	for($i = 0; $i < count($array_aux2); $i++) {
		foreach($array_aux2[$i] as $key => $value) {
			echo "$key : "."$value</br>";
		}
		
		echo "<br/>";
	}
	
	// echo "GET ID : ".$_GET['id'];
	
	echo("<a href=C_create_comment.php?id=".$_GET['id'].">Commenter</a>");
	echo("<a href=C_edit_post.php?id=".$_GET['id'].">Modifier Post</a>");
?>


<?php include("V/INCLUDE/footer.php"); ?>
</body>
</html>