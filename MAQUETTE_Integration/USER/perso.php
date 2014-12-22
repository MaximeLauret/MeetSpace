<!-- Permière page sur la quel on arrive lorsque l'on se connecte 
      On y vois la liste des projets et un + pour en rajouter un nouveau 
-->

    <?php include("../INCLUDE/header_priv.php"); ?> <!-- Le header contient la topbar et la balise body -->



    <div class="container">

        <h1>Espace personnel</h1>
      
    </div><!-- /.container -->


    <div class="container">
      <div class="row">
        <?php include("../INCLUDE/perso_viewproject.php"); ?>
        <?php include("../INCLUDE/perso_viewproject.php"); ?>
        <?php include("../INCLUDE/perso_viewproject.php"); ?>
        <?php include("../INCLUDE/perso_addproject_plus.php"); ?>
      </div>  
    </div>

	<?php include("../INCLUDE/footer_priv.php"); ?>
