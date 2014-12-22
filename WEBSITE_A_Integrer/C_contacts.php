<!--
C_contacts.php
Affiche la liste des contacts et les invitations
Auteur : Max (2014-05-13)
-->


<?php		// On démarre la session

	session_start();
	$_SESSION["USER"] = 2;

?>


<?php		// On inclut le modèle

	include("M/M_contacts.php");

?>


<?php

	$bdd = connexion();

	$liste_contacts = get_contacts ($bdd);
	
	$received_invitations = received_invitations ($bdd);
	
	$sent_invitations = sent_invitations ($bdd);

?>


<?php		// On inclut la vue

	include("V/V_contacts.php");

?>