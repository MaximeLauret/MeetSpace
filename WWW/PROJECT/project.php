<!-- Permière page sur la quel on arrive lorsque l'on se connecte 
      On y vois la liste des projets et un + pour en rajouter un nouveau 
-->
<?php include("../INCLUDE/header.php"); ?> <!-- Le header contient la topbar et la balise body -->

    <div class="container">

        <h1>Espace projet</h1>

              <div class="row">

                <div class="col-xs-12 col-sm-9 col-md-7 col-md-offset1">
                  <h3>  Lorem Tispum  <a href="./project_admin.php"><i class="fa fa-pencil"></i></a> </h3>
                  <p> Ut enim quisque sibi plurimum confidit et ut quisque maxime virtute et sapientia sic munitus est, ut nullo egeat suaque omnia in se ipso posita iudicet, ita in amicitiis expetendis colendisque maxime excellit. Quid enim? Africanus indigens mei? Minime hercule! ac ne ego quidem illius; sed ego admiratione quadam virtutis eius, ille vicissim opinione fortasse non nulla, quam de meis moribus habebat, me dilexit; auxit benevolentiam consuetudo. Sed quamquam utilitates multae et magnae consecutae sunt, non sunt tamen ab earum spe causae diligendi profectae.</p>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-4 col-md-offset-1">
                  <a class="btn btn-md btn-success" href="http://pad.meetspace.itinet.fr">   <i class="fa fa-file fa-4x"></i> Blocknote</a>
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

<?php include("../INCLUDE/footer.php"); ?>
