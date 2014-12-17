<!--
V_tab.php
Page principale, vu du tableau que l'on choisit
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->


<!DOCTYPE html>


<html>

	<?php include("V/INCLUDE/header.php"); ?>

	
	<body>

		<?php include ("V/INCLUDE/entete.php"); ?>

<!-- Menu -->
<div>
	<ul id = "menu">

	<li>
	<a class = "create_post" href = "./C_create_post.php"><img src = "V/IMG/ICONES/create_post.png"/>
	<span>
	<img src = "V/IMG/ICONES/create_post_open.png"/>
	</span>
	</a>
	</li>
<!--
	<li>
	<a class = "edit_post" href = "C_edit_post.php"><img src = "V/IMG/ICONES/edit_post.png"/>
	<span>
	<img src = "V/IMG/ICONES/edit_post_open.png"/>
	</span>
	</a>
	</li>
-->
<!--	<li>
	<a class = "delete_post" href = "delete_post.php"><img src = "V/IMG/ICONES/delete_post.png"/>
	<span>
	<img src = "V/IMG/ICONES/delete_post_open.png" />
	</span>
	</a>
	</li>
	-->

	<li>
	<a class = "search" href = "C_search.php"><img src = "V/IMG/ICONES/search.png"/>
	<span>
	<img src = "V/IMG/ICONES/search_open.png" />
	</span>
	</a>
	</li>

	<li>
	<a class = "create_board" href = "C_create_board.php"><img src = "V/IMG/ICONES/create_board.png"/>
	<span>
	<img src = "V/IMG/ICONES/create_board_open.png" />
	</span>
	</a>
	</li>
	
	<?php
		// Gestion du bouton edit_board
		if(isset($_GET["tab"])) {
			echo("
				<li>
					<a class = 'edit_board' href = 'C_edit_board.php?tab='.$_GET[tab].''><img src = 'V/IMG/ICONES/edit_board.png'/>
						<span>
							<img src = 'V/IMG/ICONES/edit_board_open.png' />
						</span>
					</a>
				</li>
			");
		} else {
			echo("
				<li>
					<a class = 'edit_board' href = '#'/><img src = 'V/IMG/ICONES/edit_board_blocked.png'/>
						<span>
							<img src = 'V/IMG/ICONES/edit_board_open_blocked.png' />
						</span>
					</a>
				</li>
			");
		}
	
	?>
	
	
	<li>
		<a class = "contacts" href = "C_contacts.php"><img src = "V/IMG/ICONES/contacts.png"/>
			<span>
				<img src = "V/IMG/ICONES/contacts_open.png" />
			</span>
		</a>
	</li>

	<li>
	<a class = "settings" href = "C_settings.php"><img src = "V/IMG/ICONES/settings.png"/>
	<span>
	<img src = "V/IMG/ICONES/settings_open.png" />
	</span>
	</a>
	</li>
	</ul>
	
		<!--Icone liste abonnements-->
	<div id='fav_show_abo'><a href = "./C_liste_abo.php"><img src = "V/IMG/FAV/favori_valid_1.png"/></a></div>
</div>


<!-- Favoris -->
<div id="fav">
	<!-- On parcourt le tableau de la liste des favori et c'est tranquille :D -->
	<?php
	// Notre table de couleur possible pour le favoris :-)
	$correspondance = array();
	array_push($correspondance, "blue");
	array_push($correspondance, "yellow");
	array_push($correspondance, "orange");
	array_push($correspondance, "pink");
	array_push($correspondance, "pink-2");
	array_push($correspondance, "green");
	array_push($correspondance, "purple");
	array_push($correspondance, "purple-2");
	$taille_tab = count($correspondance)-1;
	
	foreach($liste_fav as $key => $value) {
		$couleur = rand(0, $taille_tab);
		if($value == "#") {
			echo("<div id='fav_$key'><img src='./V/INCLUDE/fav.php?color=$correspondance[$couleur]&id_tab=$value' /></div>");
		} else {
			echo("<div id='fav_$key'><a href='C_tab.php?tab=$value'><img src='./V/INCLUDE/fav.php?color=$correspondance[$couleur]&id_tab=$value' /></a></div>");
		}
		
		
		/*
		
		#####
		Completer le code 
		#####
		
		*/
	}
	
	?>
</div>

	<!-- Zone du nom du tableau si on regarde un tableau precis -->
	<?php
		if( isset($titre_tab) ) {
			echo('<form action="#" method="POST">');
			
			// Si le mec est déjà abo, on lui propose de se désabo
			if($abo) {
		
				echo("<div id='fav_abo'><input type='image' src = \"V/IMG/FAV/favori_valid_2.png\" name='action' value='Se désabonner' /></div>");
			// Sinon, on lui met le bouton pour s'abo
			} else {
				echo("<div id='fav_abo'><input type=\"image\" src =\"V/IMG/FAV/favori_unvalid_3.png\"name=\"action\" value=\"S'abonner\" /></div>");
			}
		}
		echo('</form>');
	?>
	
	<!-- Contenu tableau -->
	<div id="contenu">
	<?php				
		if(isset($_GET["tab"])) {
			echo("<p id='board_title'> ".$titre_tab."</p>");
		} else {
			echo("<p id='board_actu'> Actualité</p>");
		}
	
	// On créer notre table de post et c'est bon :D	
	echo("<table>");
	for($i=0; isset($post[$i]); $i++) {
	
		// ON REGARDE SI $i est un multiple de 5, si oui, on change de ligne :
		if($i%5 == 0) {
			echo("</tr>");
			echo("<tr>");
		} else  {
			// RIEN
		}
			// Notre case de post
			echo("<td>");
			
			echo("<div class='post' style='background-image: url(".'"./V/IMG/BCK_Note/'.$post[$i]["couleur"].'.png"'.");' id='".$post[$i]["id"]."'>");
			echo("<a href='C_lecture-post.php?id=".$post[$i]["id"]."'>");
			echo("<p>Titre : ".$post[$i]["titre_post"]."</p>");
			echo("<p>Auteur : ".$post[$i]["auteur"]."</p>");
			echo("<p>Date : ".$post[$i]["date"]."</p>");
			echo("</a>");
			echo("</div>");
		
			echo("</td>");
	}
	
	
	
	echo("</table>");
	?>
	
	</div>
	



<?php include("V/INCLUDE/footer.php"); ?>
</body>
</html>