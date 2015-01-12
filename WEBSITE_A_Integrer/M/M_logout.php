<!--
M_logout.php
Model for the logout function
Created by Maxime (2015-01-12)
-->


<?php

function deconnexion() {
	session_unset();
	session_destroy();
	return "<meta http-equiv='Refresh' content='0; url=index.php'/>";
}

?>
