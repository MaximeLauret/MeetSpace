<!--
V_deconnexion.php
View for the logout
Created by Max (2015-01-12)
-->


<!DOCTYPE html >

<html>

	<head>

	<?php
		include("V/INCLUDE/header.php");
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
			//include ("V/INCLUDE/topbar.php");
		?>

		<form action="#" method="POST">
			<input type="submit" name="logout" value="Déconnexion"/>
		</form>

		<?php

			echo "LALALALALALA".$_SESSION["USER"];
		
		?>

		<?php
			include("V/INCLUDE/footer.php");
		?>

	</body>

</html>
