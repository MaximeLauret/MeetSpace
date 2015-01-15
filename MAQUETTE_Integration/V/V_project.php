<!--
V_project.php
View for a project page
Created by Maxime (2015-01-14)
-->


<!DOCTYPE html>

<html>

	<head>
		<?php
			include("INCLUDE/header.php");
		?>
	</head>
	
	<body>
		
		<?php
			include ("INCLUDE/topbar.php");
		?>

		<br/><br/><br/>
		Nom du projet : <?php echo $project_name; ?>
		<br/>
		Description du projet : <?php echo $project_description; ?>
		<br/>
		<form class = "form-horizontal" action = "#" method = "POST">
			<button id = "submit" name = "join_project" value = "join_project"> Rejoindre </button>
		</form>

		<?php
			include("INCLUDE/footer.php");
		?>

	</body>
</html>
