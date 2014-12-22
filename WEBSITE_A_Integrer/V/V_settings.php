<!--
V_settings.php
View for the settings page
Created by Maxime (2014-10-28)
-->

<!DOCTYPE html>

<html>

	<?php		// Including the header
		include("V/INCLUDE/header.php");
	?>
	
	<body>

		<?php		// Including the entete
			include ("V/INCLUDE/entete.php");
		?>

		<br/>
		<a href="C_modif_avatar.php"> <img src= "V/IMG/SETTINGS/change_avatar.png" title="Modifier avatar" /></a>
		<a href="C_modif_compte.php"> <img src= "V/IMG/SETTINGS/change_password.png" title = "Changer mot de passe"/></a><br/>
		<a href="C_deconnexion.php"> <img src= "V/IMG/SETTINGS/logout.png" title = "Déconnexion"/></a>
		<a href="C_suppr_compte.php"> <img src= "V/IMG/SETTINGS/delete_account.png" title = "Supprimer compte"/></a>

		<?php
			include("V/INCLUDE/footer.php");
		?>

	</body>

</html>
