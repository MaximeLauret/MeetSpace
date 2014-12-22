<!--
myprojects.php
Controller for the main page
Created by Max (2014-12-23)
-->


<!DOCTYPE html>

<html>

	<head>
		<?php
			include("./INCLUDE/header_public.php");
		?>
	</head>
	
	<body>

		<?php
		
			echo ("Hello".$_SESSION["user"]);
		
		?>

		<?php
			include("./INCLUDE/footer_public.php");
		?>

	</body>
</html>
