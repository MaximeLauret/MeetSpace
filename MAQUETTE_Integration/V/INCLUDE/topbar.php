<!--
topbar.php
Topbar
Created by Pierrick
Edited by Max (2015-01-07)
-->

<div class="topbar">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">

			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<a class="navbar-brand" href="./index.php">Meetspace</a>
				
			</div>

			<div id="navbar" class="collapse navbar-collapse">

				<ul class="nav navbar-nav navbar-right">		<!-- Menu de droite -->

					<li class="active">							<!-- Search bar -->
						<form action = "./index.php?section=search" method = "POST" class = "navbar-form navbar-right" role = "form">
							<div class="form-group">
								<input type="text" placeholder="Search" name = "keyWord" class="form-control">
							</div>
							<button type="submit" class="btn btn-success" name="search" value=""> Search </button>
						</form>
					</li>

					<!-- Cloud -->
					<li><a href="http://share.meetspace.itinet.fr"> <i class="fa fa-cloud fa-x"></i> Cloud </a></li>

					<!-- Mail -->
					<li><a href="http://mail.meetspace.itinet.fr"><i class="fa fa-envelope fa-x"></i> Mail </a></li>
			
					<!-- Profil -->
					<li><a href="./index.php?section=user&amp;part=profil"><i class="fa fa-user fa-x"></i> Profil </a></li>
				
					<!-- Deconnexion -->
					<li><a href="./C_logout.php"><i class="fa fa-user fa-x"></i> Déconnexion </a></li>

				</ul>
		
			</div>	<!-- Navbar collapse -->

		</div>		<!-- Container -->
	</nav>
</div>	

