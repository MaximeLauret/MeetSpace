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
    <title >Meetspace - Espace projet</title>
      
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

        <h1>Espace projet</h1>

              <div class="row">

                <div class="col-xs-12 col-sm-9 col-md-7 col-md-offset1">
                  <h3>  Lorem Tispum  <a href="./project_admin.php"><i class="fa fa-pencil"></i></a> </h3>
                  <p> Ut enim quisque sibi plurimum confidit et ut quisque maxime virtute et sapientia sic munitus est, ut nullo egeat suaque omnia in se ipso posita iudicet, ita in amicitiis expetendis colendisque maxime excellit. Quid enim? Africanus indigens mei? Minime hercule! ac ne ego quidem illius; sed ego admiratione quadam virtutis eius, ille vicissim opinione fortasse non nulla, quam de meis moribus habebat, me dilexit; auxit benevolentiam consuetudo. Sed quamquam utilitates multae et magnae consecutae sunt, non sunt tamen ab earum spe causae diligendi profectae.</p>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-4 col-md-offset-1">
                  <a class="btn btn-md btn-success" href="http://meetspace.itinet.fr:9001">   <i class="fa fa-file fa-4x"></i> Blocknote</a>
                  <a class="btn btn-md btn-warning" href="http://blog.meetspace.itinet.fr">   <i class="fa  fa-desktop fa-4x"></i> Blog</a>
                  
                  <div class="row">
                    
                  </div>
                </div>

              </div>
                            <div class="row">

                <div class="col-xs-12 col-sm-9 col-md-7 col-md-offset"></div>

                <div class="col-xs-12 col-md-4 col-md-offset-1">
                  
                  <div class="row">
                    <div class="col-md-12"><legend>Membres du projet:</legend>
                      <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nom</th>
                              <th>Status</th>
                              <th>Description</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Maxime</td>
                              <td>Chef</td>
                              <td>Spécialiste avant projet</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Guillaume</td>
                              <td>Membre</td>
                              <td>Spécialiste mail</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Pierrick</td>
                              <td>Membre</td>
                              <td>Mac Gyver</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                  </div>
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