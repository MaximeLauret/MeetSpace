<!--
header.php
-->

<head>

	<title>MeetSpace</title>
	<link rel="icon" href="./IMG/favicon.ico" type="image/x-icon"/>
	<meta http-equiv = "Content-Type" content = "text/html" charset = "UTF-8";>
	<link href = "http://getbootstrap.com/dist/css/bootstrap.min.css" rel = "stylesheet">		<!-- CSS BootStrap -->
	<link href = "http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel = "stylesheet">		<!-- Inclusion des icones -->
	<link rel = "stylesheet" href = "./V/INCLUDE/CSS/meetspace.css" type = "text/css">		<!-- CSS MeetSpace -->


<?php
if (isset($_SESSION['ID']))
	{
	// SI CONNECTER
		echo ("<link href = 'http://getbootstrap.com/examples/starter-template/starter-template.css' rel='stylesheet'>");
	}
	else
	{
	// SI DECONNECTER
		echo ("<link href = 'http://getbootstrap.com/examples/cover/cover.css' rel='stylesheet'>");
	}
?>
    
</head>
