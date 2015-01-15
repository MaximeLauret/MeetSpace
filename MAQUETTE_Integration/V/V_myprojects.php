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
		
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		
		Lancez votre propre projet <?php echo $_SESSION['USER']; ?>
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
