<!--
myprojects.php
Controller for the main page
Created by Max (2014-12-23)
-->


<!DOCTYPE html>

<html>

		<?php
			include("./V/INCLUDE/header.php");
		?>
	
	<body>
		
		<?php
			include ("./V/INCLUDE/topbar.php");
		?>
		
		<?php
		
			$i = 0;
			echo "Bonjour ";
			echo $_SESSION['USER'];
			
		
		?>
		
		Lancez votre propre projet
		<form class = "form-horizontal" action = "#" method = "POST">
			<!-- PROJECT NAME INPUT -->
				<input id = "pseudoinput" name = "project_name_input" type = "text" placeholder = "Nom du projet" class = "form-control input-md" required = "">
			<!-- PROJECT DESCRIPTION INPUT -->
				<input id = "text" name = "project_description_input" type = "text" placeholder = "Description" class = "form-control input-md">
			<!-- SUBMIT BUTTON -->
				<button id = "submit" name = "create_project" class = "btn btn-success btn-lg" value = "create_project"> Créer le projet !
				</button>
		</form>

		<?php
			include("INCLUDE/footer.php");
		?>

	</body>
</html>
