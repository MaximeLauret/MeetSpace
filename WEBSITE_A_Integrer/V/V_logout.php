<!--
V_logout.php
View for the log out function
Created by Max (2015-01-07)
-->


<!DOCTYPE html>

<html>
	
	<head>
		
		<?php
			include("./V/INCLUDE/header.php");		// Including the Header
		?>

		<?php

			if(isset($auto_refresh)) {
				echo($auto_refresh);
			} else {
				// Nothing
			}
		?>
		
	</head>

	<body>
		
		<?php
			include ("./V/INCLUDE/entete.php");		// Including the Entete
		?>

		<form action="#" method="POST">
			<input type="submit" name="deco" value="Déconnexion"/>
		</form>

		<?php
			include("./V/INCLUDE/footer.php");		// Including the Footer
		?>
		
	</body>

</html>
