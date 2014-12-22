<!--
V_contacts.php
Affiche la liste des contacts et les invitations
Auteur : Max (2014-05-13)
-->


<!DOCTYPE html>

<html>

<?php		// On inclut le header

	include("V/INCLUDE/header.php");

?>

	<body>
	
		<?php		// On inclut l'entête
		
			include ("V/INCLUDE/entete.php");
			
		?>


		<!-- LISTE DES CONTACTS -->
		
		<p>
		
			Vos contacts :
			
		</p>

		<?php
			
			foreach ($liste_contacts as $value) {
				
				echo ("<br/>" . "SENDER : " . $value["sender_nickname"] . "<br/>");
				echo ("RECEIVER : " . $value["receiver_nickname"] . "<br/>");
				
			}
			
		?>
			
		<!-- INVITATIONS RECUES -->
			
		<p>
		
			Invitations reçues :
			
		</p>
		
		<?php
			
			foreach ($received_invitations as $value) {
			
				echo ($value["sender_nickname"] . " souhaite vous inviter. ");
				
				echo ("<form action = '#' method = 'post'>");
				echo ("<input type = 'hidden' name = 'sender_id' value = " . $value["sender_id"] . "/>");
				echo ("<input type = 'submit' name = 'accept' value = 'Accepter'/>");
				echo ("<input type = 'submit' name = 'refuse' value = 'Refuser'/>");
				echo ("</form>");

			}
			
			if (isset ($_POST["accept"])) {
				accept_invitation ($bdd, $_POST["sender_id"], $received_invitations);
			} else if (isset ($_POST["refuse"])) {
				refuse_invitation ($bdd, $_POST["sender_id"]);
			} else {
				// Il ne se passe absolument rien
			}
			
		?>
			
			
		<!-- INVITATIONS ENVOYEES -->
		
		<p>
		
			Invitations envoyées :
			
		</p>
		
		<?php
		
			foreach ($sent_invitations as $value) {
			
				echo ("Vous avez envoyé une invitation à " . $value["receiver_nickname"]);
				
				echo ("<form action = '#' method = 'post'/>");
				echo ("<input type = 'hidden' name = 'receiver_id' value = " . $value["receiver_id"] . "/>");
				echo ("<input type = 'submit' name = 'cancel' value = 'Annuler'/>");
				echo ("</form>");

			}
			
			if (isset ($_POST["cancel"])) {
				cancel_invitations ($bdd, $_POST["receiver_id"], $sent_invitations);
			} else {
				// Il ne se passe absolument rien
			}
			
		?>

		
		<?php
		
			if (isset ($_POST["accept"])) {
				$accept_invitation;
			} else if (isset ($_POST["refuse"])) {
				$refuse_invitation;
			} else {
				/* Il ne se passe absolument rien. */
			}
			
		?>	
			


		<?php		// On inclut le footer
		
			include("V/INCLUDE/footer.php");
			
		?>
		
	</body>
	
</html>