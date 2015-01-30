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

		<section>      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-2 col-md-offset2">
            <?php


						foreach ($projects_users as $value) 
						{

							if ($value ["ID"]==NULL){}// Si l'ID du projet est NULL alors on n'affiche rien
							else{
								if($value ["ID"]==$_SESSION["ID"])
								{
	              					
										echo '<div class="listBouton"><a class="btn btn-md btn-success" href="http://pad.meetspace.itinet.fr/p/'.$project->get('NAME').'">   <i class="fa fa-file fa-4x"></i> Blocknote</a></div>';
										foreach ($projects_manager as $value) 
										{
											if ($value["ID"]==$_SESSION["ID"]) {
												//L'utilisateur est chef de projet. On lui affiche les outils d'administration
												echo '<div class="listBouton"><a class="btn btn-md btn-info" href="http://'.$project->get('NAME').'.meetspace.itinet.fr//auth.php" >   <i class="fa  fa-desktop fa-4x"></i> Blog - Admin</a></div>';
	             								echo '<div class="listBouton"><a class="btn btn-md btn-danger" href="http://phpmyadmin.meetspace.itinet.fr">   <i class="fa  fa-database fa-4x"></i> Base de données</a></div>';
											}
										}
									//Inscrit: Bouton quitter
	              					echo '<a href=\'./index.php?section=project&part=quitproject&ID='.$project->get('ID') .'\'>';
									echo'<button id = "leave_project" name = "leave_project" class = "btn btn-danger btn-lg" value = "leave_project"> Quitter le projet </button>';
									echo '</a>';
								}
								else{//Pas inscrit: Bouton voir le site internet
	              					echo '	<div class="listBouton"><a class="btn btn-md btn-warning" href="http://'.$project->get('NAME').'.meetspace.itinet.fr">   <i class="fa  fa-desktop fa-4x"></i> Site</a></div>';
	              					
									
									//Pas inscrit: Bouton rejoindre
	              					echo '<a href=\'./index.php?section=project&part=joinproject&ID='.$project->get('ID') .'\'>';
									echo '<button id = "submit" name = "join_project" class = "btn btn-success btn-lg" value = "join_project"> Rejoindre le projet </button>';
									echo '</a>';
							

								}																		
							}	
						}

						?>
				</div>
					
					<div class="col-xs-12 col-md-5 col-md-offset-3">
					<?php 
						foreach ($projects_manager as $value) 
										{
											if ($value["ID"]==$_SESSION["ID"]) {
												//L'utilisateur est chef de projet. On lui affiche les outils d'administration
												echo '<h3>'.$project->get('NAME').'</h3>';
												echo '<p>contact@'.$project->get('NAME').'.meetspace.itinet.fr</p>';
												//Modifier la description du projet
												echo'
												<form method="post" action="./index.php?section=project&part=project&ID='.$project->get('ID').'"">
												<p>
												<label>Editer la description de votre projet:</label><br>
												<textarea name="PROJECT_DESCRIPTION" rows = 8 cols = "40">'.$project->get('PROJECT_DESCRIPTION').'</textarea>
												</p>
												<!-- SUBMIT BUTTON -->
												<button id="submit" name="login" class="btn btn-primary btn-md" value="set_description">Valider</button>
												</form>';
											}
											else{
												//Affichage des infos sur le projet
												echo '<h3>'.$project->get('NAME').'</h3>';
												echo '<h4>Adresse mail du projet: contact@'.$project->get('NAME').'.meetspace.itinet.fr</h4>';
												echo '<p>'.$project->get('PROJECT_DESCRIPTION').'<p>	';
											}
										}
											
						?>
					</div>	
					<div class="col-xs-12 col-md-7 col-md-offset-5">
					<?php 

						// Fonction pour afficher la liste des membre du projet
						echo' <h4> Membre du projet:</h4>';
						foreach ($projects_users as $value) 
						{
							if ($value ["ID"]==NULL){}// Si l'ID du projet est NULL alors on n'affiche rien
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
