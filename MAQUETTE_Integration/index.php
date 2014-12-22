<!-- Première page sur la quel on arrive
	Formulaire d'inscription et de connection
-->
<?php include("./INCLUDE/header_public.php"); ?>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand" href="/">MeetSpace</h3>
            </div>
          </div>
        </div>
              <section class="row">
                <!-- Colone de gauche - Description -->

      
                <div class="col-xs-12 col-sm-5 col-md-offset-2 col-md-4  " >
                
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
                <div class="col-xs-12 col-sm-5 col-md-offset-1 col-md-5" >
                  <h3>Connexion</h3>

                  <!-- Formulaire de connexion-->
              <form class="form-horizontal">
              <fieldset>

              <!-- Form Name -->

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="pseudoinput">Votre pseudo</label>  
                <div class="col-md-4">
                <input id="pseudoinput" name="pseudoinput" type="text" placeholder="" class="form-control input-md" required="">
                  
                </div>
              </div>

              <!-- Password input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">Mot de passe</label>
                <div class="col-md-4">
                  <input id="passwordinput" name="passwordinput" type="password" placeholder="" class="form-control input-md">
                  
                </div>
              </div>

              <!-- Button -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="subbmit"></label>
                <div class="col-md-4">
                  <button id="subbmit" name="subbmit" class="btn btn-primary btn-lg ">Connexion</button>
                </div>
              </div>

              </fieldset>
              </form>
            <!-- Fin formulaire de connexion -->

            <!-- Formulaire d'inscription -->
            <h3>Inscription</h3>
                  <form class="form-horizontal" action="#" method="POST">
                  <fieldset>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="pseudoinput">Votre pseudo</label>  
                    <div class="col-md-4">
                    <input id="pseudoinput" name="nickname_r" type="text" placeholder="" class="form-control input-md" required="">
                      
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="pseudoinput">Adresse mail</label>  
                    <div class="col-md-4">
                    <input id="pseudoinput" name="mail_r" type="text" placeholder="" class="form-control input-md" required="">
                      
                    </div>
                  </div>

                  <!-- Password input 1-->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="passwordinput">Mot de passe</label>
                    <div class="col-md-4">
                      <input id="passwordinput" name="pwd_r1" type="password" placeholder="" class="form-control input-md">
                      
                    </div>
                  </div>
                  <!-- Password input 2-->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="passwordinput">Confirmation du mot de passe</label>
                    <div class="col-md-4">
                      <input id="passwordinput" name="pwd_r2" type="password" placeholder="" class="form-control input-md">
                      
                    </div>
                  </div>

                  <!-- Button -->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="subbmit"></label>
                    <div class="col-md-4">
                      <button id="subbmit" name="signin" class="btn btn-success btn-lg" value="Log in">Inscription</button>

                    </div>
                  </div>

                  </fieldset>
                  </form>
                <!-- Fin formulaire d'inscription -->
                </div>
                <!-- / Colone de Droite - Connection et Inscription -->

              </section>
            <!-- Pied de page -->
            <div class="cover-container">
                <div class="mastfoot">
                  <div class="inner">
                    <p> Réalisé par Pierrick VERAN à l'aide de <a href="http://getbootstrap.com/">Bootstrap</a>.</p>
                  </div>
                </div>
             </div>   
              
            <!-- / Pied de page -->
<?php include("./INCLUDE/footer_public.php"); ?>