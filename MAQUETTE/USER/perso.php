<!-- Permière page sur la quel on arrive lorsque l'on se connecte 
      On y vois la liste des projets et un + pour en rajouter un nouveau 
-->
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
    <title >Meetspace - Espace personnel</title>
      
    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./espace_perso_files/ie-emulation-modes-warning.js"></script>

    <!-- Inclusion des iconnes -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <!-- Feuille de style de meetspace -->
    <link href="../INCLUDE/CSS/meetspace.css" rel="stylesheet">

  </head>

  <body>

    <?php include("../INCLUDE/topbar.php"); ?>

    <div class="container">

        <h1>Espace personnel - Gestion des projets</h1>
      
    </div><!-- /.container -->


    <div class="container">
      <div class="row">
        <?php include("../INCLUDE/perso_viewproject.php"); ?>
        <?php include("../INCLUDE/perso_viewproject.php"); ?>
        <?php include("../INCLUDE/perso_viewproject.php"); ?>
        <?php include("../INCLUDE/perso_addproject_plus.php"); ?>
      </div>  
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./espace_perso_files/jquery.min.js"></script>
    <script src="./espace_perso_files/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./espace_perso_files/ie10-viewport-bug-workaround.js"></script>
  

</body></html>