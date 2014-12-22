<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Meetspace - Espace personnel</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./espace_perso_files/ie-emulation-modes-warning.js"></script>

    <!-- Inclusion des iconnes -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Feuille de style de meetspace -->
    <link href="#" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php include("../INCLUDE/topbar.php"); ?>

    <div class="container">

      <!-- Navigation dans l'espace personnel-->
      <div class="starter-template">
        <h1>Bienvenue dans votre espace personnel</h1>
        <p class="lead">Que voulez vous faire?</p>
         <a class="btn btn-lg btn-success" href="./espace_perso_projet.php">   <i class="fa fa-users fa-4x"></i> Projet</a>
        <!--<a class="btn btn-lg btn-primary" href="http://share.meetspace.itinet.fr">   <i class="fa fa-cloud fa-4x"></i> Cloud</a>--> 
        <!--<a class="btn btn-lg btn-info" href="http://mail.meetspace.itinet.fr">   <i class="fa fa-envelope fa-4x"></i></i> Mail</a>--> 
        <a class="btn btn-lg btn-warning" href="./espace_perso_profil.php">   <i class="fa  fa-user fa-4x"></i></i> Profil</a>
      </div>

    <!-- Formulaire -->
    <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Modifier votre profil </legend>

<!-- Password input-->
<div class="form-group" >
  <label class="col-md-4 control-label" for="passwordinput"> Mot de passe actuel</label>
  <div class="col-md-5">
    <input id="passwordinput" name="passwordinput" type="password" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Nouveau mot de passe</label>
  <div class="col-md-5">
    <input id="passwordinput" name="passwordinput" type="password" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput"></label>
  <div class="col-md-5">
    <input id="passwordinput" name="passwordinput" type="password" placeholder="" class="form-control input-md">
    <span class="help-block">Tapez deux fois votre nouveau mot de passe</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Valider</button>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Sexe</label>
  <div class="col-md-5">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">Homme</option>
      <option value="2">Femme</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Biographie</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="textarea">Parlez de vous  !=)</textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Valider</button>
  </div>
</div>

</fieldset>
</form>

    <!-- Fin du formulaire -->


</div>
</div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./espace_perso_files/jquery.min.js"></script>
    <script src="./espace_perso_files/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./espace_perso_files/ie10-viewport-bug-workaround.js"></script>
  

</body></html>