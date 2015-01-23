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
		<section>
			<div class="container">
				<div class="row">
						<?php include ("./V/INCLUDE/topbar.php"); ?>

						<?php
							
							echo '<h3>Bonjour '.$user->get('NICKNAME').'</h3>';
							
							echo "<h4>Voici vos projets : </h4>";

							echo "<br/>";
							
							foreach ($projects_list as $element) {
								
								echo ("<h4>
											Nom du projet : <a href = './C_project.php?id=".$user_name."</a>
										</h4>");		// Affiche le nom du projet et fait le lien vers la page de celui-ci.
								echo ("<br/>");
								echo ("<h5>Description : </h5>").$element["PROJECT_DESCRIPTION"];		// Affiche la description s'il y a.
								echo ("<form action = '#' method = 'POST'>".		// Formulaire pour récupérer le nom du projet.		À PLANQUER
										"<button id = 'submit' name = 'leave_project' value = 'leave_project' > Quitter le projet </button>
										</form>");
								echo "<br/>";

							}

							/*if ($i == 0) {
								echo ("Vous ne collaborez à aucun projet.
								<br/>
								Rejoignez-en un ou créez le votre dès maintenant !");
							} else {
								// Nothing
							}*/
							
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
					</section>
			 	</div>  
			</div>
	</body>
		<?php
			include("INCLUDE/footer.php");
		?>


</html>
