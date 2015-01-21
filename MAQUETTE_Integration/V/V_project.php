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
			<?php
				include ("INCLUDE/topbar.php");
			?>
			
		<section>

		<?php
			echo ("<h3>");
				echo $project_name;
			echo ("</h3>");
			echo ("<p>");
				echo $project_description;
			echo ("</p>");
			echo ("<br/><br/>");

			foreach ($projects_users_names as $element2) {
				echo $element2["NICKNAME"];
			}
		?>
		
			<form class = "form-horizontal" action = "#" method = "POST">
				<button id = "submit" name = "join_project" value = "join_project"> Rejoindre le projet </button>
				<button id = "submit" name = "leave_project" value = "leave_project"> Quitter </button>
			</form>

			<!--<?php

				if ($status == "MANAGER") {
					echo ("<form class = 'form-horizontal' action = '#' method = 'POST'>
						<button id = 'submit' name = 'delete_project' value = 'delete_project'> Supprimer le projet </button>
					</form>");
				} else {
					// Nothing
				}

			?> -->
		</section>
		

		<?php
			include("INCLUDE/footer.php");
		?>

	</body>
</html>
