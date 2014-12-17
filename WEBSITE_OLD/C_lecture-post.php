<!--
C_lecture-post.php
Auteur : Mike Tyson (le 5.05.14)
MaJ : ---
-->
<?php session_start(); ?>
<!-- Modèle -->
<?php include("M/M_lecture-post.php"); ?>

<!--Contrôleur -->
<?php 

// Lignes pour simuler des variables :-) 

?>

<?php
	$bdd = connexion();
	$num = $_GET['id'];
	$_SESSION["post"] = $_GET['id'];
	
	if(isset($num)) {
		$array_aux = get_posts($bdd, $num);
		$array_aux2 = get_comments($bdd, $num);
	} else {
		// NOTHING
	}	
?>

<!-- Vue -->
<?php include("V/V_lecture-post.php"); ?>