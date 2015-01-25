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
				<?php include ("./V/INCLUDE/topbar.php"); ?>
				<div class="row">


						<div class="col-xs-12 col-md-12 col-md-offset">
							<?php
								
								echo '<h3>Bonjour '.$user->get('NICKNAME').'</h3>';

								

								//if ($projects_list == NULL || isset ($projects_list)){
								//	echo ("Vous ne collaborez à aucun projet.<br/>
								//	Rejoignez-en un ou créez le votre dès maintenant !");
								//}
								//else{
									echo "<h4>Voici vos projets : </h4>";

									foreach ($projects_list as $element) {
										echo '<div class="col-xs-12 col-md-4 col-md-offset">';

											// Affiche le nom du projet et fait le lien vers la page de celui-ci.								
										echo ('<h4>'.$element['NAME'].' : <a href = \'./index.php\''.$element['ID'].'</a> </h4>');	
										echo ("<h5>Description : </h5>".$element["PROJECT_DESCRIPTION"]);		// Affiche la description s'il y a.

										echo '</div>';
									}
								//}

								/*if ($i == 0) {
									echo ("Vous ne collaborez à aucun projet.
									<br/>
									Rejoignez-en un ou créez le votre dès maintenant !");
								} else {
									// Nothing
								}*/
								
							?>
						</div>
						<div class="col-xs-12 col-md-3 col-md-offset">
							<div  class="project" >
								<form class = "form-horizontal" action = "#" method = "POST">
								<legend>Lancez votre propre projet</legend>
									<!-- PROJECT NAME INPUT -->
										<input id = "pseudoinput" name = "project_name_input" type = "text" placeholder = "Nom du projet" class = "form-control input-md" required = "true">
									<!-- PROJECT DESCRIPTION INPUT -->
										<input id = "text" name = "project_description_input" type = "text" placeholder = "Description" class = "form-control input-md" required = "true">
									<!-- SUBMIT BUTTON -->
										<button id = "submit" name = "create_project" class = "btn btn-success btn-lg" value = "create_project"> Créer </button>
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
