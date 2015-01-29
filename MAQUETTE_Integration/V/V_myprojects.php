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
			<!--<div class="container"> -->
				<?php include ("./V/INCLUDE/topbar.php"); ?>
				<!-- <div class="row"> -->


						<div class="col-xs-12 col-md-12 col-md-offset">
							<?php								
								echo '<h3>Bonjour '.$user->get('NICKNAME').'</h3>';

									foreach ($user_projects as $value) {
										echo"<div class=\"col-xs-12 col-md-3 col-md-offset\">
										<div  class=\"project\" >";
										$tab[$i]=$project= new Project($value['ID']); // Projet non initialiser. 
										echo '<a href="./index.php?section=project&amp;part=project&amp;ID='.$project->get('ID').'">';
										echo '<h3>'.$project->get('NAME').'</h3>';
										echo '<p>'.$project->get('PROJECT_DESCRIPTION').'<p>';
										echo '</a>';

										echo '</div></div>';
										$i++;
										}
							
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
	<?php include("INCLUDE/footer.php"); ?>
</html>
