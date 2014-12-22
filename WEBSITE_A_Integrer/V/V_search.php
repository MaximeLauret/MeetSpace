<!--
V_search.php
View for the search tool
Created by Maxime (2014-10-28)
-->

<html>

	<?php
		include("V/INCLUDE/header.php");		// Including the header
	?>
	
	<body>
		<?php
			include ("V/INCLUDE/entete.php");		// Including the entete
		?>

		<title>Recherche</title>
	
		<form action="#" method="POST">
			<p>
				Que voulez-vous rechercher ?
			</p>
			<br/>
			<input type="text" name="look_for">
			<br/>	
			<p>Rechercher par :
				<input type="radio" name="search" value="users" checked='checked'>Membre
				<input type="radio" name="search" value="posts">Post
				<input type="radio" name="search" value="boards">Tableau
				<br/>
				<br/>
				<br/>
				<input type="submit" name="go_search" value="Rechercher">
			</p>
		<form>

		<?php
			echo "Vos résultats : ";
			for($i=0; isset($tab[$i]); $i++) {
				echo("<div class='post' id='".$tab[$i]["id"]."'>");
				echo("<p>".$tab[$i]["resultat"]."</p>");
				echo("<p>".$tab[$i]["ligne"]."</p>");
			}		
		?>

		<?php
			include("V/INCLUDE/footer.php");		// Including the footer
		?>
		
	</body>

</html>
