<!--
V_profile.php
View for the profile page
Created by Maxime (2015-07-01)
-->


<!DOCTYPE html>

<html>

	<?php include ("./V/INCLUDE/header.php");?>	
	<body>
		<?php include ("./V/INCLUDE/topbar.php"); ?>

		<section>
			<div class="col-xs-12 col-md-3 col-md-offset-1">
				<?php //PARTIE DE GAUCHE - AFFICHAGE DES PROJETS
					echo '<img src="'.$user_profile_picture.'">';
				?>
			</div>

			<div class="col-xs-12 col-md-5 col-md-offset">
				<?php //PARTIE DE GAUCHE - AFFICHAGE DU PROFIL
					echo '<h3>' .$user_profile_name. '</h3>';
					echo '<p>'.$user_profile_mail.'</p>';
					echo '<p>'.$user_profile_description.'</p>';
				?>
			</div>

			<div class="col-xs-12 col-md-2 col-md-offset1">
				<div class="profil_project">
				<?php //PARTIE DE GAUCHE - AFFICHAGE DES PROJETS
					echo '<h4>Vous êtes abonné au projet suivant:</h4>';
					$i=0;
					foreach ($user_projects as $value) {	
						$tab[$i]=$project= new Project($value['ID']); // Projet non initialiser. 
						echo '<a href="./index.php?section=project&amp;part=project&amp;ID='.$project->get('ID').'">';
						echo '<h3>'.$project->get('NAME').'</h3>';
						echo '<p>'.$project->get('PROJECT_DESCRIPTION').'<p>';
						echo '</a>';
						$i++;
						}
									
				?>
				</div>
			</div>

		</section>
	</body>

	<?php include ("./V/INCLUDE/footer.php"); // Including the footer?>

</html>
