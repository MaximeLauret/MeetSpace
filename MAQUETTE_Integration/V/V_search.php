<!--
V_search.php
View for the search tool
Created by Maxime (2015-01-07)
-->

<!DOCTYPE html>

	<html>

		<?php
			include("./V/INCLUDE/header.php");		// Including the header
		?>

		<body><section>

			<?php
				include ("./V/INCLUDE/topbar.php");	// Including the topbar
			?>

			<?php
				echo "<h3>Utilisateur:</h3>";
				if (isset($users_results)) // SI IL Y A DES RESULTATS
				{
					foreach ($users_results as $key => $value) {
					echo $value[result] . '<br />';
					}
				}
				else
				{
					echo "<p>La recherche n'a trouvé aucun utilisateur.</p>";
				}
				
				echo "<h3>Projet:</h3>";
				if (isset($projects_results)) // SI L'UTILISATEUR EST CONNECTE// SI IL Y A DES RESULTATS
				{
					foreach ($projects_results as $key => $value) {
					echo $value[result] . '<br />';
					}
				}
				else
				{
					echo "<p>La recherche n'a trouvé aucun projet.</p>";
				}
			?>

			<?php
				include("./V/INCLUDE/footer.php");		// Including the footer
			?>
		</section>
		</body>

	</html>