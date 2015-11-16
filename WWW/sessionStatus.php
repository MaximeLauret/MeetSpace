
<?php
	session_start();
?>
	
<?php
	if (isset($_SESSION['ID']))
	 {
		#echo "Session Enabled and Session values Created";
	 }
	else
	{
		#echo "Session Enabled but No Session values Created";
		header("Location: ./C_public.php");
	}
?>
