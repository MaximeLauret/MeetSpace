<!--
M_modele.php
fichier modèle modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php

function deconnexion() {
	session_unset();
	session_destroy();
	return "<meta http-equiv='Refresh' content='0; url=index.php'/>";
}

?>