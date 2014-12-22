<!-- Première page sur la quel on arrive
	Formulaire d'inscription et de connection
-->

    <?php include("./INCLUDE/header_public.php"); ?>
<!-- Colone de gauche - Description -->

      
                <div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-2" >
                
                <div class="inner cover">
                 <h1 class="cover-heading">Bienvenue sur MeetSpace</h1>            
                </div>

                  <p class="lead">
                    Réunissez-vous où que vous soyez et à tout moment avec MeetSpace, <br> l'espace de réunion en ligne. <br>Créez votre réseau et profitez des services offerts par MeetSpace pour gérer votre projet.</p>
                  <p class="lead">
                    <a href="./about.php" class="btn btn-lg btn-default">En savoir plus</a>
                  </p>

                </div><!-- / Colone de gauche - Description -->

<!--  Colone de Droite - Connection et Inscription -->
                <div class="col-xs-12 col-sm-5 col-md-2 col-md-offset-2 " >
                  <h3>Connexion</h3>

  <!-- Formulaire de connexion-->
              <form class="form-horizontal">
              


              <!-- Pseudo input-->
              <input id="pseudoinput" name="pseudoinput" type="text" placeholder="pseudo" class="form-control input-md" required="">
                

              <!-- Password input-->
              <input id="passwordinput" name="passwordinput" type="password" placeholder="password" class="form-control input-md" required="">

              <!-- Button connexion -->
              <button id="subbmit" name="subbmit" class="btn btn-primary btn-lg ">Connexion</button>


              
              </form>
  <!-- Fin formulaire de connexion -->

  <!-- Formulaire d'inscription -->
            <h3>Inscription</h3>
                  <form class="form-horizontal" action="#" method="POST">
                                        
                    <!-- Pseudo -->
                    <input id="pseudoinput" name="nickname_r" type="text" placeholder="pseudo" class="form-control input-md" required="">
                      
                    <!-- Mail -->
                    <input id="pseudoinput" name="mail_r" type="text" placeholder="mail" class="form-control input-md" required="">

                    <!-- Premier mot de passe -->
                    <input id="passwordinput" name="pwd_r1" type="password" placeholder="Mot de passe" class="form-control input-md" required="">
                      
                    <!-- Validation du mot de passe -->
                    <input id="passwordinput" name="pwd_r2" type="password" placeholder="Comfirmation du mot de passe" class="form-control input-md" required="">

                  <!-- Validation -->
                    <button id="subbmit" name="signin" class="btn btn-success btn-lg" value="Log in">Inscription</button>
                  </form>
  <!-- Fin formulaire d'inscription -->

                <!-- / Colone de Droite - Connection et Inscription -->

              </section>

<?php include("./INCLUDE/footer_public.php"); ?>