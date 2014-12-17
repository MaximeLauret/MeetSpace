<!--
V_projects.php
View for the main page, where the project list is.
Created by Maxime (2014-12-09)
-->

<!DOCTYPE html>

<html>

	<head>
		<?php
			include ("V/INCLUDE/header.php");
		?>
	</head>

	<body>
	
		<?php		// Header & menu
			include ("V/INCLUDE/entete.php");
			
			// if (isset ($_SESSION['id']) ) {
				include ("V/INCLUDE/menu.php");
			// } else {
				// Don't fucking show it at all
			//}
		?>
		
		
		<!-- PAGE -->
		
		<div id="welcome"> 
			My Projects
			<br/>
			<br/>
		</div>
	
			<?php
			
				echo ("<table>");		// Creating the tiles table
					for ($i = 0; isset ($post [$i]); $i++) {
						if ($i%5 == 0) {						// Checking if $i is a 5 multiple
							echo ("<tr>");
							echo ("</tr>");
						} else {
							// Nothing
						}
							echo ("<div class = 'tile' style = 'background-image: url (".'"/V/IMG/tile.png"'.");' id = '".$tile[$i]["id"]."'>");
								// echo ("<a href = '"$project_name".meetspace.itinet.fr>'");
								// echo ("<p>" $project_name "</p>");
								echo ("</a>");
							echo ("</div>");
					}
						// echo "<a href = ".$project_name."meetspace.itinet.fr>";
						echo "<img src = 'V/IMG/tile.png' id = 'tile'/>";
					// }
				echo ("</table>");
			
			?>

		<?php
		
			include("V/INCLUDE/footer.php");
			
		?>

	</body>
	
</html>
