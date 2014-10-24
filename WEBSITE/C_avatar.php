<!--
C_modele.php
fichier contrôleur modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include("header.php"); ?>
<body>
<!-- Modèle -->
<?php include("M/M_avatar.php"); ?>

<?php $_SESSION["pseudo"] = 3; ?>

<!--Contrôleur -->
<?php
$bdd = connexion();

// Verification si on a reçu un post
if(isset( $_POST["Submit"] )) {

	print_r($_FILES);
	// Vérification du fichier
	if( verif_img($_FILES["avatar"])  ) {
	echo("<br/>");
		// l'image est correcte, on la valide et on la place dans la bdd
		add_bdd($bdd, $_FILES["avatar"]["tmp_name"], $_SESSION["pseudo"]);
		echo '<img src="img.php?id_img='.$_SESSION["pseudo"].'" alt="TEST" title="TEST" />';
		
		
	} else {
		// RIEN
	}
} else {
	// RIEN
}

?>


<!-- Vue -->
<?php include ("entete.php"); ?>
<?php include("V/V_avatar.php"); ?>
<?php include("footer.php"); ?>
</body>
</html>