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
		
		<?php include ("./V/INCLUDE/topbar.php"); ?>
	
		
		<?php
		
			echo "<h3>Bonjour ".$_SESSION['USER']."</h3>";
			echo "<h4>Voici vos projets : </h4>";
			foreach ($projects_list as $element) {
				echo ("<a href = './../C_project.php?".$element['NAME']."'>".$element['NAME']."</a>");		// Affiche le nom du projet et fait le lien vers la page de celui-ci.
				echo ("<br/>");
				echo $element["PROJECT_DESCRIPTION"];		// Affiche la description s'il y a.
				echo ("<form action = '#' method = 'POST'>".		// Formulaire pour récupérer le nom du projet.		À PLANQUER
						"<input id = 'text' name = 'project_selection' value = ".$element['NAME'].">
						<button id = 'submit' name = 'leave_project' value = 'leave_project' > Quitter le projet </button>
						</form>");
				echo "<br/>";
			}
		
		?>
		
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-3 col-lg-offset">
			<div  class="project" >
				<form class = "form-horizontal" action = "#" method = "POST">
				<legend>Lancez votre propre projet</legend>
					<!-- PROJECT NAME INPUT -->
						<input id = "pseudoinput" name = "project_name_input" type = "text" placeholder = "Nom du projet" class = "form-control input-md" required = "">
					<!-- PROJECT DESCRIPTION INPUT -->
						<input id = "text" name = "project_description_input" type = "text" placeholder = "Description" class = "form-control input-md">
					<!-- SUBMIT BUTTON -->
						<button id = "submit" name = "create_project" class = "btn btn-success btn-lg" value = "create_project"> Créer
						</button>
				</form>
			</div>
		</div>

		<?php
			include("INCLUDE/footer.php");
		?>

	</body>
</html>
