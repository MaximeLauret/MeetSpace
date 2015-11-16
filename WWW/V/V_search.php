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

		<body>
			<div class="container">
				<div class="row">
					<section>

						<?php include ("./V/INCLUDE/topbar.php");	// Including the topbar?>

						<div class="col-xs-12 col-md-4 col-md-offset-2">
							<div class="searchResult">
								<?php
								echo "<h3>Projet:</h3>";
								if (isset($projects_results)) // SI IL Y A DES RESULTATS
								{
									foreach ($projects_results as $key => $value) {
									echo '<a href="./index.php?section=project&amp;part=project&amp;ID='.$value['id'].'">';
									echo $value['result'] . '<br /></a>';
									}
								}
								else
								{
									echo "<p>La recherche n'a trouvé aucun projet.</p>";
								}
								?>
							</div>
						</div>

						<div class="col-xs-12 col-md-4 col-md-offset2">
							<div class="searchResult">
							<?php

								echo "<h3>Utilisateur:</h3>";
								if (isset($users_results)) // SI IL Y A DES RESULTATS
								{
									foreach ($users_results as $key => $value) {
									echo '<a href="./index.php?section=user&amp;part=profil&amp;ID='.$value['id'].'">';
									echo $value['result'] . '<br />';
									}
								}
								else
								{
									echo "<p>La recherche n'a trouvé aucun utilisateur.</p>";
								}
							?>
							</div>
						</div>	

					</section>
				</div>
	</div>
		</body>
		<?php
			include("./V/INCLUDE/footer.php");		// Including the footer
		?>
	</html>