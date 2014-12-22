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

<li>
<a class = "edit_post" href = "edit_post.php"><img src = "V/IMG/ICONES/edit_post.png"/>
<span>
<img src = "V/IMG/ICONES/edit_post_open.png"/>
</span>
</a>
</li>

<li>
<a class = "delete_post" href = "delete_post.php"><img src = "V/IMG/ICONES/delete_post.png"/>
<span>
<img src = "V/IMG/ICONES/delete_post_open.png" />
</span>
</a>
</li>

<li>
<a class = "search" href = "search.php"><img src = "V/IMG/ICONES/search.png"/>
<span>
<img src = "V/IMG/ICONES/search_open.png" />
</span>
</a>
</li>

<li>
<a class = "create_board" href = "create_board.php"><img src = "V/IMG/ICONES/create_board.png"/>
<span>
<img src = "V/IMG/ICONES/create_board_open.png" />
</span>
</a>
</li>

<li>
<a class = "contacts" href = "contacts.php"><img src = "V/IMG/ICONES/contacts.png"/>
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
</div>
</div>

<!-- Favoris -->
<div>
	<!-- On parcourt le tableau de la liste des favori et c'est tranquille :D -->
	<?php
	foreach($liste_fav as $key => $value) {
		/*
		
		#####
		Completer le code 
		#####
		
		*/
	}
	
	?>
</div>

<!-- Contenu tableau -->
<div>
	<!-- On parcourt le tableau de post et c'est bon :D -->
	<?php
	// for($i=0; isset($post[$i]); $i++) {
		print_r($post);
	// }
	?>
</div>


<?php include("V/INCLUDE/footer.php"); ?>
</body>
</html>