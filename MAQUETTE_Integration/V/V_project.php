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
					<div class="col-xs-12 col-md-5 col-md-offset-1">
						<?php
						echo '<h3>'.$project->get('NAME').'</h3>';
						echo '<p>'.$project->get('PROJECT_DESCRIPTION').'<p>';	
						?>
					</div>
					<div class="col-xs-12 col-md-4 col-md-offset-1">
	                  <?php echo '<a class="btn btn-md btn-success" href="http://pad.meetspace.itinet.fr/p/'.$project->get('NAME').'">   <i class="fa fa-file fa-4x"></i> Blocknote</a>'?>
	                  <?php echo '<a class="btn btn-md btn-warning" href="http://'.$project->get('NAME').'.meetspace.itinet.fr">   <i class="fa  fa-desktop fa-4x"></i> Site</a>'?>
					</div>

				</div>
			</div>
		</section>
	</body>		
	<?php
		include("INCLUDE/footer.php");
	?>
</html>
