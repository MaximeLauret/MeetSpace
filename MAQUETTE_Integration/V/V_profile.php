<!--
V_profile.php
View for the profile page
Created by Maxime (2015-07-01)
-->


<!DOCTYPE html>

<html>

	<?php
		include ("INCLUDE/header.php");
	?>
	
	<body>
	
	<?php
		print_r ($_SESSION);
	?>
	
		<div class="container">
		
		<div class="row">

			<div class = "col-xs-12 col-sm-9 col-md-9 col-lg-1 col-lg-offset-2">		<!-- Profile picture -->
				<?php
					echo $profile_picture;
				?>
			</div>

		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 col-lg-offset">		<!-- Content -->
				
			<?php
				echo $profile_name;
			?>

			<?php
				echo "<p>";
					echo $profile_description;
				echo "</p>"
			?>

		</div>

		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-lg-offset2">		<!-- Subscribed project list -->
		
			<?php
				echo $profile_name." est abonné(e) au(x) projet(s) suivant(s) : ";
			?>
			
			<div>
				<div class = "col-xs-12 col-sm-3 col-md-3 col-lg-3">
					
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-9">
				  <h4>Lorem tispum</h4>
				  <p><span class="badge">451</span> Contributeur </p>
				</div>
			</div>

			  <div>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" >
				  <img src="http://lorempixel.com/50/50/business/" class="img-thumbnail" alt="Cinque Terre" >
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-9">
				  <h4>Lorem tispum</h4>
				  <p><span class="badge">451</span> Contributeur </p>
				</div>
			  </div>

			  <div>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" >
				  <img src="http://lorempixel.com/50/50/business/" class="img-thumbnail" alt="Cinque Terre" >
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-9">
				  <h4>Lorem tispum</h4>
				  <p><span class="badge">451</span> Contributeur </p>
				</div>
			  </div>
			</div>
		</div>

	 </div>
    

	<?php
		include ("INCLUDE/footer.php");		// Including the footer
	?>
	
	</body>

</html>
