<!--
V_project.php
View for a project page
Created by Maxime (2015-01-14)
-->


<!DOCTYPE html>

<html>
	
	<?php
		include("INCLUDE/header.php");
	?>
	
	<body>

		<?php include ("./V/INCLUDE/topbar.php"); ?>

		<section>
			<div class="col-xs-12 col-md-3 col-md-offset-1">
				<?php //PARTIE DE GAUCHE - AFFICHAGE DE L'IMAGE
					// echo '<img src="'.$project_picture.'">';
					echo '<img src="./IMG/default_project_picture.png"';
				?>
			</div>

			<div class="col-xs-12 col-md-5 col-md-offset">
				<?php //PARTIE DE GAUCHE - AFFICHAGE DU PROFIL
					echo ("<h3> Nom du projet </h3>");
					echo ("<p> Description du projet </p>");
					//echo '<h3>' .$project_name. '</h3>';
					//echo '<p>'.$project_description.'</p>';
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

			<div class = "col-xs-12 col-md-2 col-md-offset1">
				<div class = "profil_project">
					<?php		//PARTIE DE GAUCHE - AFFICHAGE DES COLLABORATEURS
						$i=0;

						echo (
							'<div id="profile_viewAllProject">
							<ul class="profile_viewProjectList">'
						);
						
						foreach ($user_projects as $value) {
							if ($value['ID'] == NULL) {
								// Nothing
							} else {
								$tab[$i] = $project = new Project($value['ID']); // Projet non initialiser. 
								echo (
									'<li class="profile_viewProject">
										<a href="./index.php?section=project&amp;part=project&amp;ID='.$project->get('ID').'">
											<div class="profile_viewProject">
												<img src="./IMG/default_project_picture.png" class=\'profile_viewProject_img\'>
												<div class="profile_viewProject_description">
													<p class="profile_viewProject_name">'.$project->get('NAME').'</p>
													<p class="profile_viewProject_description">'.$project->get('NAME').'@meetspace</p>
												</div>
											</div>
										</a>
									</li>'
								);
								$i++;
							}
						}

						echo (
							'</ul>
							</div>'
						);						
					?>
					
				</div>
			</div>
				?>
			</div>
					<?php		// COndition qui permet de savoir si l'on est abonné ou non au projet.
						/*foreach ($projects_users as $value) {
							if ($value ["ID"]==NULL){
								// Nothing
							} else if ($value ["ID"] == $_SESSION["ID"]) {
								echo "Vous collaborez au projet.";
							} else {
								echo "Vous ne collaborez pas au projet.";
							}
						}*/
					?>

					<div class="col-xs-12 col-md-5 col-md-offset-3">
						<?php
							echo '<h3>'.$project->get('NAME').'</h3>';
							echo '<p>'.$project->get('PROJECT_DESCRIPTION').'<p>';	
							?>
					</div>

					<div class="col-xs-12 col-md-2 col-md-offset2">
						<?php
							echo ('<div class="listBouton"><a class="btn btn-md btn-success" href="http://pad.meetspace.itinet.fr/p/'.$project->get('NAME').'">   <i class="fa fa-file fa-4x"></i> Blocknote</a></div>');
						?>
						
						<?php
							echo ('<div class="listBouton"><a class="btn btn-md btn-warning" href="http://'.$project->get('NAME').'.meetspace.itinet.fr">   <i class="fa  fa-desktop fa-4x"></i> Site</a></div>');
						?>
						
						<?php
							echo ('<div class="listBouton"><a class="btn btn-md btn-info" href="http://'.$project->get('NAME').'.meetspace.itinet.fr//auth.php" >   <i class="fa  fa-desktop fa-4x"></i> Blog - Admin</a></div>');
						?>
						
						<?php
							echo ('<div class="listBouton"><a class="btn btn-md btn-danger" href="http://phpmyadmin.meetspace.itinet.fr">   <i class="fa  fa-database fa-4x"></i> Base de données</a></div>');
						?>
                   
					</div>
					<div class="col-xs-12 col-md-4 col-md-offset-8">
						<?php 
							echo' <p> Membre du projet:</p>';
							foreach ($projects_users as $value) 
							{

								if ($value ["ID"]==NULL){
									}// Si l'ID du projet est NULL alors on n'affiche rien
								else{
									$user3 = new User($value ["ID"]);
									echo '<p>'.$user3->get('NICKNAME').'</p>';
									echo '<p>'.$user3->get('DESCRIPTION').'</p>';
								}	
							}
						 ?>
					 </div>

				</div>
			</div>
		</section>
	</body>		
	<?php
		include("INCLUDE/footer.php");
	?>
</html>
