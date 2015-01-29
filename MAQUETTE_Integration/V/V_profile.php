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
					if (!isset($_GET['ID'])) // ET SI ON A DES PARMS DANS L'URL
					{
						echo'
					<form method="post" action="./index.php?section=user&amp;part=profil">
					<p>
					<label>Editer votre description:</label><br>
					<textarea name="PROFILE_DESCRIPTION" rows = 6 cols = "50">'.$user_profile_description.'</textarea>
					</p>
					<!-- SUBMIT BUTTON -->
					<button id="submit" name="login" class="btn btn-primary btn-md" value="set_description">Changer ma description</button>
					</form>';
					}
				?>
			</div>

			<div class="col-xs-12 col-md-2 col-md-offset1">
				<div class="profil_project">
				<?php //PARTIE DE GAUCHE - AFFICHAGE DES PROJETS
					echo '<h4>Vous êtes abonné au projet suivant:</h4>';
					$i=0;

					echo '
						<div id="profile_viewAllProject">
						<ul class="profile_viewProjectList"> 
					';
					foreach ($user_projects as $value) 
					{
						if ($value['ID']==NULL){}// Si l'ID du projet est NULL alors on n'affiche rien
						else
						{	
							$tab[$i]=$project= new Project($value['ID']); // Projet non initialiser. 
							echo '
								<li class="profile_viewProject">
									<a href="./index.php?section=project&amp;part=project&amp;ID='.$project->get('ID').'">
										<div class="profile_viewProject">
											<img src="./IMG/default_project_picture.png" class=\'profile_viewProject_img\'>
											<div class="profile_viewProject_description">
												<p class="profile_viewProject_name">'.$project->get('NAME').'</p>
												<p class="profile_viewProject_description">'.$project->get('NAME').'@meetspace</p>
											</div>
										</div>
									</a>
								</li>
								';
							$i++;
						}
					}

						echo '
							</ul>
							</div>

						';
									
				?>
				</div>
			</div>

		</section>
	</body>

	<?php include ("./V/INCLUDE/footer.php"); // Including the footer?>

</html>
