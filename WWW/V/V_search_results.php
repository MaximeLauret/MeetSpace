<!--
V_search_results.php
View for the search results page
Created by Maxime (2015-07-01)
-->


<!DOCTYPE html>

<html>

	<?php
		include ("./INCLUDE/header.php");			// Including the header
	?>
	
	<body>
	
		<?php
			include ("./INCLUDE/topbar.php");		// Including the topbar
		?>
		
		<?php
		
			echo "Résultats de recherche pour : ".$_POST['keyword'];
				for ($i = 0; isset ($array[$i]); $i++) {
					echo ("<div class = '?' id = '".$array[$i]["ID"]."'");
					echo ("<p>".$array[$i]["result"]."</p>");
					echo ("<p>".$array[$i]["line"]."</p>");
				}
		
		?>

	</body>

</html>
