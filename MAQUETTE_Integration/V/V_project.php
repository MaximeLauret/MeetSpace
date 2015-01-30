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
		<section>
			<div class="container">
			<?php include ("./V/INCLUDE/topbar.php"); ?>
				<div class="row">
					<div class="col-xs-12 col-md-5 col-md-offset-3">
						<?php
						echo '<h3>'.$project->get('NAME').'</h3>';
						echo '<p>'.$project->get('PROJECT_DESCRIPTION').'<p>';	
						?>
					</div>
					<div class="col-xs-12 col-md-2 col-md-offset2">
	                  <?php echo '<div class="listBouton"><a class="btn btn-md btn-success" href="http://pad.meetspace.itinet.fr/p/'.$project->get('NAME').'">   <i class="fa fa-file fa-4x"></i> Blocknote</a></div>'?>
	                  <?php echo '<div class="listBouton"><a class="btn btn-md btn-warning" href="http://'.$project->get('NAME').'.meetspace.itinet.fr">   <i class="fa  fa-desktop fa-4x"></i> Site</a></div>'?>
                      <?php echo '<div class="listBouton"><a class="btn btn-md btn-info" href="http://'.$project->get('NAME').'.meetspace.itinet.fr//auth.php" >   <i class="fa  fa-desktop fa-4x"></i> Blog - Admin</a></div>'?>
                      <?php echo '<div class="listBouton"><a class="btn btn-md btn-danger" href="http://phpmyadmin.meetspace.itinet.fr">   <i class="fa  fa-database fa-4x"></i> Base de données</a></div>'?>
                   
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
