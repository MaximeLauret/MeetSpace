<?php
	/**
	* @return bool
	*/
	$status = session_status();
	if($status == PHP_SESSION_DISABLED)
	{
		echo "Session is Disabled";
	}
	else if($status == PHP_SESSION_NONE )
	{
		echo "Session Enabled but No Session values Created";
	}
	else
	{
		echo "Session Enabled and Session values Created";
	}
?>