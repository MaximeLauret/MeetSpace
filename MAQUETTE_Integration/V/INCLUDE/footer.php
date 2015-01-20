<!--
footer.php
-->

<footer>


<?php
	if (isset($_SESSION['ID']))
	{
	// SI CONNECTER
		include_once ("./V/V_jappix.php");
	}
	else
	{
	// SI DECONNECTER
		echo "
		<div class = \"cover-container\">
		<div class=\"mastfoot\">
			<div class=\"inner\">
				<p>
					Réalisé par l'équipe MeetSpace à l'aide de <a href=\"http://getbootstrap.com/\">Bootstrap</a>.
				</p>
				
				<p>
					<a href = \"#\"> Contact | </a>
					<a href = \"#\"> Licences | </a>
					<a href = \"#\"> GitHub </a>
				</p>
				
			</div>
		</div>
		</div>";
	}
?>
	
</footer>

