<!--
M_lecture-post.php
fichier modèle modèle
Auteur : Mike Tyson (le 5.05.14)
MaJ : ---
-->
<?php
	function connexion() {
		/* Connexion à la BDD */
		try {
		$bdd = new PDO('mysql:host=localhost;dbname=notepost', 'root', '');
		} catch (Exception $e) {
			die("Erreur : ".$e->getMessage());
		}
		return $bdd;
	}

	function get_posts($bdd, $id_post) {
		$post = array();
		$i = 0;
		$request = $bdd->prepare('SELECT post_name, message, users.nickname FROM posts
									LEFT JOIN users ON posts.id = users.id
									WHERE posts.id =:id_post');
		$request->execute(array("id_post" => $id_post));
		
		while($donnees = $request->fetch()) {
			$post[$i]['nom_post'] = $donnees['post_name'];
			$post[$i]['msg_post'] = $donnees['message'];
			$post[$i]['user'] = $donnees['nickname'];
			// $post[$i]['commentaire'] = $donnees['text_comment'];
			// $post[$i]['id_commentaire'] = $donnees['id'];
			$i++;
		}
		
		return $post;
	}
	
	function get_comments($bdd, $id_post) {
		$comment = array();
		$i = 0;
		$request = $bdd->prepare('SELECT text_comment, comments.creation_date, comments.id FROM comments					
									LEFT JOIN posts on posts.id = comments.posts
									WHERE posts.id =:id_post');
		
		$request->execute(array("id_post" => $id_post));
		
		while($donnees = $request->fetch()) {
			$comment[$i]['commentaire'] = $donnees['text_comment'];
			$comment[$i]['date'] = $donnees['creation_date'];
			$comment[$i]['ID_commentaire'] = $donnees['id'];
			
			$i++;
		}
		
		return $comment;
	}
?>