<!-- Permière page sur la quel on arrive lorsque l'on se connecte 
      On y vois la liste des projets et un + pour en rajouter un nouveau 
-->

<?php include("../INCLUDE/header.php"); ?> <!-- Le header contient la topbar et la balise body -->

    <div class="container">

        <h1>Espace projet</h1>

              <div class="row">

                <div class="col-xs-12 col-sm-9 col-md-7 col-md-offset">
                  <h3><textarea> Lorem Tispum  </textarea> </h3>
                  <p>
                    <textarea class="form-control" rows="3">
                    Ut enim quisque sibi plurimum confidit et ut quisque maxime virtute et sapientia sic munitus est, ut nullo egeat suaque omnia in se ipso posita iudicet, ita in amicitiis expetendis colendisque maxime excellit. Quid enim? Africanus indigens mei? Minime hercule! ac ne ego quidem illius; sed ego admiratione quadam virtutis eius, ille vicissim opinione fortasse non nulla, quam de meis moribus habebat, me dilexit; auxit benevolentiam consuetudo. Sed quamquam utilitates multae et magnae consecutae sunt, non sunt tamen ab earum spe causae diligendi profectae.
                    </textarea>
                  </p>
                  <a class="btn btn-md btn-success" href="./project.php">OK</a>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-4 col-md-offset-1">

                    <div class="form-group">
                      <a class="btn btn-md btn-info" href="http://admin.blog.meetspace.itinet.fr" >   <i class="fa  fa-desktop fa-4x"></i> Blog - Admin</a>
                      <a class="btn btn-md btn-danger" href="http://phpmyadmin.meetspace.itinet.fr">   <i class="fa  fa-database fa-4x"></i> Base de données</a>
                    </div>
                  
                  <div class="row">
                    
                  </div>
                </div>

              </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-9 col-md-7 col-md-offset"></div>
                  <div class="col-xs-12 col-sm-3 col-md-4 col-md-offset-1">                  
                    <div class="row">
                    <div class="col-md-12"><legend>Gestion des membres</legend>
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
                              <td><button class="btn btn-danger btn-mini">X</button></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Guillaume</td>
                              <td>Membre</td>
                              <td>Spécialiste mail</td>
                              <td><button class="btn btn-danger btn-mini">X</button></td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Pierrick</td>
                              <td>Membre</td>
                              <td>Mac Gyver</td>
                              <td><button class="btn btn-danger btn-mini">X</button></td>
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