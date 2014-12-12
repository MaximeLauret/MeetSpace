<!--
C_modele.php
fichier contrôleur modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php session_start(); ?>
<!-- Modèle -->
<?php include("M/M_modif_avatar.php"); ?>

<!--Contrôleur -->
<?php
$bdd = connexion();

// Verification si on a reçu un post
if(isset( $_POST["Submit"] )) {

	// Vérification du fichier
	if( verif_img($_FILES["avatar"])  ) {
		// l'image est correcte, on la valide et on la place dans la bdd
		add_bdd($bdd, $_FILES["avatar"]["tmp_name"], $_SESSION["user"]);		
		$message="Avatar bien modifié :-)";
	} else {
		$message="Il y a une erreur avec l'image voici les conditions :<br/>-Le fichier doit faire moins de 5Mo<br/>-L'image doit être en .png<br/>-La définition de l'image doit être compris entre 50*50 et 500*500 pixels<br/><span style='color:red;'>-Le duck-face est strictement interdit !</span>";
	}
} else {
	// RIEN
	$message="";
}


?>


<!-- Vue -->
<?php include("V/V_modif_avatar.php"); ?>