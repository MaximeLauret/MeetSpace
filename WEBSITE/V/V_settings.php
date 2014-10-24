<!--
V_modele.php
fichier vue modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<!DOCTYPE html>
<html>
<?php include("V/INCLUDE/header.php"); ?>
<body>
<?php include ("V/INCLUDE/entete.php"); ?>



<!-- Ici le code du View :D -->
<br/>
<a href="C_modif_avatar.php"> <img src= "V/IMG/SETTINGS/change_avatar.png" title="Modifier avatar" /></a>
<a href="C_modif_compte.php"> <img src= "V/IMG/SETTINGS/change_password.png" title = "Changer mot de passe"/></a><br/>
<a href="C_deconnexion.php"> <img src= "V/IMG/SETTINGS/logout.png" title = "Déconnexion"/></a>
<a href="C_suppr_compte.php"> <img src= "V/IMG/SETTINGS/delete_account.png" title = "Supprimer compte"/></a>



<?php include("V/INCLUDE/footer.php"); ?>
</body>
</html>