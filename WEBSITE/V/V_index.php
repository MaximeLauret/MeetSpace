<!--
V_home_page.php
View for the home page
Created by Maxime (2014-10-24)
-->

<!DOCTYPE html>

<html>

	<head>

		<?php
			include ("V/INCLUDE/header.php");
		?>
		
		<?php

			if(isset($message) AND $message == "OK") {
				echo("<meta http-equiv='Refresh' content='0; url=C_home_page.php'/>");
			} else {
				// RIEN
			}
		?>

	</head>

	<body>
	
		<?php
			include ("V/INCLUDE/entete.php");
		?>
		
		<?php 
			if(isset($message)) {
				echo("<p style='text-align:center;color:red;'>".$message."</p>");
			} else {
				// RIEN
			}
		?>
		
		<div id="welcome"> 
			Welcome on MeetSpace, the online meeting space.
			<br/>
			<br/>
		</div>

		<h2>
			<center>
				Sign in
			</center>
		</h2>
		<form action="#" method="POST">
			<p><center>Nickname : <input type="text" name="nickname_r" required></center>
			<p><center>Password : <input type="password" name="pwd_r" required></center><br/>
			<center><input type="submit" name="register" value="Sign in"></center>
		</form>
	
		<h2><center>Log in</center></h2>
	
		<form action="C_projects.php" method="POST">
			<p><center>Nickname : <input type="text" name="nickname_c" required></center>
			<p><center>Password : <input type="password" name="pwd_c" required></center><br/>
			<center><input type="submit" name="signin" value="Log in"></center>
		</form>

		<?php
		
			include("V/INCLUDE/footer.php");
			
		?>

	</body>
	
</html>
