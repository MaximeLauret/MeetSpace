<!--
V_creer_un_tableau.php
Auteur : Valentin (le 16.04.14)
-->
<!DOCTYPE html>
<html>
<?php include("/V/INCLUDE/header.php"); ?>
<body>
<?php include ("./V/INCLUDE/entete.php"); ?>

<form action="C_create_board.php" method="POST">

	<!-- Creation -->
	<input type="text" name="create_board" value="" placeholder="Creer ton tableau"/>
	<input type="submit" name="action" value="Creer"/><br>
	
</form>

<?php 
if( isset($message) ) {
	echo("<p>$message</p>");
}
?>

<?php
//Vue 
include("V/INCLUDE/footer.php"); 
?>
</body>
</html>