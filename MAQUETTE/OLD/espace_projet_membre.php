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
        <?php include("../INCLUDE/topbar_projet.php"); ?>

    <div class="container-fluid">

        <!-- Navigation dans l'espace personnel-->
      <div class="starter-template">
        <h1>Bienvenue dans l'espace de votre projet</h1>
        <p class="lead">Que voulez vous faire?</p>
        <a class="btn btn-lg btn-success" href="http://meetspace.itinet.fr:9001">   <i class="fa fa-file fa-4x"></i> Blocknote</a>
        <a class="btn btn-lg btn-primary" href="http://share.meetspace.itinet.fr/">   <i class="fa fa-cloud fa-4x"></i> Cloud</a> 
        <a class="btn btn-lg btn-info" href="http://mail.meetspace.itinet.fr/">   <i class="fa fa-envelope fa-4x"></i> Mail</a>
        <a class="btn btn-lg btn-warning" href="http://blog.meetspace.itinet.fr">   <i class="fa  fa-desktop fa-4x"></i> Blog</a>
        <a class="btn btn-lg btn-info" href="http://admin.blog.meetspace.itinet.fr">   <i class="fa  fa-desktop fa-4x"></i> Blog - Admin</a>
        <a class="btn btn-lg btn-danger" href="http://phpmyadmin.meetspace.itinet.fr">   <i class="fa  fa-database fa-4x"></i> Base de données</a>
        <a class="btn btn-lg btn-default" href="./espace_projet_membre.php">   <i class="fa  fa-users fa-4x"></i> Gérer les membres</a>
      </div>

        <div class="row">
          <div class="col-lg-12"><legend>Gestion des membres</legend>
            <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Maxime</td>
                    <td>Chef</td>
                    <td>Spécialiste avant projet</td>
                    <td><button class="btn btn-danger btn-mini disabled">X</button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Guillaume</td>
                    <td>Membre</td>
                    <td>Spécialiste mail</td>
                    <td><button class="btn btn-danger btn-mini disabled">X</button></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Pierrick</td>
                    <td>Membre</td>
                    <td>Mac Gyver</td>
                    <td><button class="btn btn-danger btn-mini disabled">X</button></td>
                  </tr>
                </tbody>
              </table>
          </div>
        </div>
<div class="row">
          <div class="col-lg-12"><legend>Requête pour rejoindre le projet</legend>
            <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Accepter</th>
                    <th>Refuser</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Margaux</td>
                    <td>Spécialiste réseau</td>
                    <td><button class="btn btn-success btn-mini disabled">V</button></td>
                    <td><button class="btn btn-danger btn-mini disabled">X</button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Alan</td>
                    <td>Spécialiste bootstrap</td>
                     <td><button class="btn btn-success btn-mini disabled">V</button></td>
                    <td><button class="btn btn-danger btn-mini disabled">X</button></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Adjevi</td>
                    <td>Maître Jedi</td>
                    <td><button class="btn btn-success btn-mini disabled">V</button></td>
                    <td><button class="btn btn-danger btn-mini disabled">X</button></td>
                  </tr>
                </tbody>
              </table>
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