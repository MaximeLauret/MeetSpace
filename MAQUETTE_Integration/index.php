<!-- Première page sur la quel on arrive
	Formulaire d'inscription et de connection
-->

<<<<<<< HEAD
<?php
	include("./INCLUDE/header_public.php");
?>

<div class="site-wrapper">

	<div class="site-wrapper-inner">

		<div class="cover-container">

			<div class="masthead clearfix">
				<div class="inner">
				<h3 class="masthead-brand" href="/">
					MeetSpace
				</h3>
			</div>
		</div>
	</div>
             <section class="row">
               <!-- Colone de gauche - Description -->

      
               <div class="col-xs-12 col-sm-5 col-md-offset-2 col-md-4  " >
=======
    <?php include("./INCLUDE/header_public.php"); ?>
<!-- Colone de gauche - Description -->

      
                <div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-2" >
>>>>>>> fda6701cd85ef9e28b881b5111f549562b72b0fd
                
                <div class="inner cover">
                 <h1 class="cover-heading">Bienvenue sur MeetSpace</h1>            
                </div>

                  <p class="lead">
                    Réunissez-vous où que vous soyez et à tout moment avec MeetSpace, <br> l'espace de réunion en ligne. <br>Créez votre réseau et profitez des services offerts par MeetSpace pour gérer votre projet.</p>
                  <p class="lead">
                    <a href="./about.php" class="btn btn-lg btn-default">En savoir plus</a>
                  </p>

                </div><!-- / Colone de gauche - Description -->

<<<<<<< HEAD
                <!--  Colone de Droite - Connection et Inscription -->
                <div class="col-xs-12 col-sm-5 col-md-offset-1 col-md-5" >
				<h3>Connexion</h3>


<!-- Formulaire de connexion-->
	<form class="form-horizontal">
	<fieldset>

	<!-- Text input-->
		<div class="form-group">
		<label class="col-md-4 control-label" for="pseudoinput">Votre pseudo</label>  
		<div class="col-md-4">
		<input id="pseudoinput" name="pseudoinput" type="text" placeholder="" class="form-control input-md" required="">
                  
                </div>
              </div>
=======
<!--  Colone de Droite - Connection et Inscription -->
                <div class="col-xs-12 col-sm-5 col-md-2 col-md-offset-2 " >
                  <h3>Connexion</h3>

  <!-- Formulaire de connexion-->
              <form class="form-horizontal">
              


              <!-- Pseudo input-->
              <input id="pseudoinput" name="pseudoinput" type="text" placeholder="pseudo" class="form-control input-md" required="">
                
>>>>>>> fda6701cd85ef9e28b881b5111f549562b72b0fd

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
<<<<<<< HEAD
            <!-- Pied de page -->
            <div class="cover-container">
                <div class="mastfoot">
                  <div class="inner">
                    <p> Réalisé par Pierrick VERAN à l'aide de <a href="http://getbootstrap.com/">Bootstrap</a>.</p>
                  </div>
                </div>
             </div>   
              
            <!-- / Pied de page -->
<<<<<<< HEAD


      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./BOOTSTRAP/index_files/jquery.min.js"></script>
    <script src="./BOOTSTRAP/index_files/bootstrap.min.js"></script>
    <script src="./BOOTSTRAP/index_files/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./BOOTSTRAP/index_files/ie10-viewport-bug-workaround.js"></script>
  

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1418569482010">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1418569482010" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div></body></html>
=======
<?php include("./INCLUDE/footer_public.php"); ?>
>>>>>>> 0d4acfb5dc1bef9653e6f7689d199b4a9b663ead
=======

<?php include("./INCLUDE/footer_public.php"); ?>
>>>>>>> fda6701cd85ef9e28b881b5111f549562b72b0fd
