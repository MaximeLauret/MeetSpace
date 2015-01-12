<!--
M_logout.php
Model for the log out function
Created by Max (2015-01-07)
-->


<?php

	function logout() {
		session_unset();
		session_destroy();
		return "<meta http-equiv='Refresh' content='0; url = index.php'/>";
	}

?>
