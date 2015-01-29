<!--
C_profile.php
Controller for the profile page
Created by Maxime (2015-07-01)
-->
<?php
	$project= new Project(false); // Projet non initialiser. 
	if (isset($_GET['ID'])) // ET SI ON A DES PARMS DANS L'URL
		{
			$user2= new User($_GET['ID']);
			$user_projects=$project->find_USER_PROJECTS($user2->get('ID'));
			$user_profile_name=$user2->get('NICKNAME');
			$user_profile_mail=$user2->get('NICKNAME').'@meetspace.itinet.fr</p>';
			$user_profile_description=$user2->get('DESCRIPTION');
			$user_profile_picture='./V/INCLUDE/IMG/default_profile_picture.png';
		}
		else
		{	
			$user_projects=$project->find_USER_PROJECTS($user->get('ID'));
			$user_profile_name=$user->get('NICKNAME');
			$user_profile_mail=$user->get('NICKNAME').'@meetspace.itinet.fr</p>';
			$user_profile_description=$user->get('DESCRIPTION');
			$user_profile_picture='./V/INCLUDE/IMG/default_profile_picture.png';
		}

		if (isset($_POST['PROFILE_DESCRIPTION'])) // ET SI ON A DES PARMS DANS L'URL
			{
				var_dump($_POST['PROFILE_DESCRIPTION']);
				$user->setDESCRIPTION($_POST['PROFILE_DESCRIPTION']);
				//header("Location: ./index.php?section=user&part=profil");
			}
		/*if (!isset($user->get('DESCRIPTION'))) { echo'<p> Vous n\'avez pas encore complété votre profil</p>';}
		}*/

	
/*

	if (isset ($user_profile_picture)) {		// Checking if the user set a profile picture.
		$profile_picture = $user_profile_picture;		// If so, showing it.
	} else {
		$profile_picture = "<img src = 'INCLUDE/IMG/default_profile_picture.png' class = 'img-thumbnail'>";		// Otherwise, displaying the default profile picture
	}
	
	$profile_name = get_user_name ($database);
	
	$profile_description = get_profile_description ($database);
*/
?>

<?php
	include ("V/V_profile.php");
?>
