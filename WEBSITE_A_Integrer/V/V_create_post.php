<!--
V_create_post.php
Create a post
Auteur : Max (2014-04-16)
-->


<!DOCTYPE html>

<html>

	<head>
	
		<?php		// Including the header
		
			include("/INCLUDE/header.php");
			
			if (isset($returning)) {
				header ("refresh: 2;URL=C_tab.php");
			} else {
			}
			
		?>
	
	</head>

	<body>
	
		<?php		// Including the entete
		
			include ("/INCLUDE/entete.php");
			
		?>

		<p>			<!-- Form -->
		
			<img src="/IMG/ICONES/create_post.png">

			<form action = "#" method = "post">
				<input type = "text" name = "POST_NAME" placeholder = "Titre">
				<br/>
				<br/>
				<textarea rows="5" cols = "30" wrap = hard name = "MESSAGE" placeholder = "Message"></textarea>
				<br/>
				<select name = "BOARD">
					<?php
						foreach ($board_list as $value) {
							echo ("<option>");
							echo ($value);
							echo("</option>");
						}
					?>
				</select>
				<input type = "submit" name = "POST" value = "Post">
			</form>
		</p>

		<?php		// Checking if all fields are filled

			if (isset ($_POST["POST"])) {
				if ($_POST["POST_NAME"] === "") {
					echo "Veuillez entrer un titre pour votre message."."<br/>";
				}
				if ($_POST["MESSAGE"] === "") {
					echo "Veuillez entrer un message."."<br/>";
				}
				else {
					/* Creating the post and redirecting */
					echo ($create_post);
					echo ("Votre post a bien été créé!");
				}
			}
		
		?>
		
		<?php		// Including the footer
		
			include ("/INCLUDE/footer.php");
			
		?>
	
	</body>

</html>