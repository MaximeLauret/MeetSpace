<!DOCTYPE html>
<!-- saved from url=(0034)http://localhost/espace_perso.php -->
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

    <div class="container-fluid">

        <!-- Navigation dans l'espace personnel-->
        <div class="starter-template">
        <h1>Bienvenue dans votre espace personnel</h1>
        <p class="lead">Que voulez vous faire?</p>
        <a class="btn btn-lg btn-success" href="./espace_perso_projet.php">   <i class="fa fa-users fa-4x"></i> Projet</a>
        <!--<a class="btn btn-lg btn-primary" href="http://share.meetspace.itinet.fr">   <i class="fa fa-cloud fa-4x"></i> Cloud</a>--> 
        <!--<a class="btn btn-lg btn-info" href="http://mail.meetspace.itinet.fr">   <i class="fa fa-envelope fa-4x"></i></i> Mail</a>--> 
        <a class="btn btn-lg btn-warning" href="./espace_perso_profil.php">   <i class="fa  fa-user fa-4x"></i></i> Profil</a>
      </div>

        <div class="row">
          <div class="col-lg-12"><legend>Espace projet</legend></div>
        </div>

        <div class="row">
          <div class="col-md-4"><legend>Les projets aux quels je participe</legend>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nom du projet</th>
                  <th>Status</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Projet1</td>
                  <td>Maxime</td>
                  <td>Projet de Peace And Love opensource</td>
                  <td><a href=".././project/espace_projet.php" class="btn btn-primary btn-mini ">&gt;</a></td>                  
                </tr>
                <tr>
                  <td>Projet2</td>
                  <td>Guillaume</td>
                  <td>Projet Ligue Of Legend</td>
                  <td><a href=".././project/espace_projet.php" class="btn btn-default btn-mini ">&gt;</a></td>                  
                </tr>
                <tr>
                  <td>Projet3</td>
                  <td>Pierrick</td>
                  <td>Projet de dévellopement durable !</td>
                  <td><a href=".././project/espace_projet.php" class="btn btn-default btn-mini ">&gt;</a></td>                  
                </tr>
              </tbody>
            </table>
          </div>

          <div class="col-md-4">

            <legend>Rechercher un projet</legend>

            <!-- Début formulaire -->
            <form class="form-horizontal">
              <fieldset>

              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Rechercher par</label>
                <div class="col-md-4">
                  <select id="selectbasic" name="selectbasic" class="form-control">
                    <option value="1">Nom</option>
                    <option value="2">Nom du chef de projet</option>
                  </select>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="textinput"></label>  
                <div class="col-md-4">
                <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md">
                  
                </div>
              </div>

              <!-- Button -->
              <div class="form-group">
                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-4">
                  <button id="" name="" class="btn btn-primary">Rechercher</button>
                </div>
              </div>

              </fieldset>
              </form>

            <!-- Fin formulaire -->
          </div>
          

          <div class="col-md-4"> <legend> Créer un projet</legend>
            <!-- Formulaire -->
            <form class="form-horizontal">
              <fieldset>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Nom du projet</label>  
                <div class="col-md-5">
                <input id="textinput" name="textinput" type="text" placeholder="projet1" class="form-control input-md" required="">
                  
                </div>
              </div>

              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="textarea">Description du projet</label>
                <div class="col-md-4">                     
                  <textarea class="form-control" id="textarea" name="textarea">Courte description</textarea>
                </div>
              </div>

              <!-- Button -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                  <button id="singlebutton" name="singlebutton" class="btn btn-primary">Créé</button>
                </div>
              </div>

              </fieldset>
            </form>


            <!-- Fin du formulaire -->
          </div>
      </div>
    </div>


    <!-- Formulaire -->
    <!-- Fin du formulaire -->

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