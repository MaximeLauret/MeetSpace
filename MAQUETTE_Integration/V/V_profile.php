<!--
V_profile.php
View for the profile page
Created by Maxime (2015-07-01)
-->


<!DOCTYPE html>

<html>

	<?php
		include ("./V/INCLUDE/header.php");
	?>	
	<body>
		<?php include ("./V/INCLUDE/topbar.php"); ?>
		<section>
			<?php  echo'<h3>Ici apparaitra bientôt votre profil ' . $_SESSION['USER'] .'</h3>' ?> </h3>
		</section>
	</body>

	<?php
		include ("./V/INCLUDE/footer.php");		// Including the footer
	?>

</html>
