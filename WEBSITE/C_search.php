<!--
C_search.php
fichier contrôleur 
Auteur : Michael (le 18.04.14)
MaJ : --
-->

<?php session_start(); ?>
<!DOCTYPE html>
<html>

<body>
<!-- Modèle -->
<?php include("M/M_search.php"); ?>

<?php // Lignes pour simuler des variables :-) ?>

<!--Contrôleur -->
<?php
	$bdd = connexion();

// CODE CONTROLEUR

	if(isset($_POST['go_search']) AND $_POST['look_for'] !== "") {
		if($_POST['search'] === 'users') {
			$tab = search_by_member($bdd, $_POST['look_for']);
		} else if($_POST['search'] === 'posts') {
			$tab = search_by_post($bdd, $_POST['look_for']);
		} else if($_POST['search'] === 'boards') {
			$tab = search_by_board($bdd, $_POST['look_for']);
		} else {
			// nothing to do :)
		}
	} else {
		// nothing to do :)
	}
?>

<!-- Vue -->

<?php include("V/V_search.php"); ?>

</body>
</html>