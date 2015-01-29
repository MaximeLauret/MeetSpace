<!--
topbar.php
Topbar
Created by Pierrick
Edited by Max (2015-01-07)
-->

		
<div class = "topbar-meetspace">		<!-- Barre de menu -->
			
	<a href = "./index.php">			<!-- Logo MeetSpace -->
		<img src = "./V/INCLUDE/IMG/logo.png">
	</a>
			
	<ul class="nav navbar-nav navbar-right">		<!-- Menu de droite -->
		<li class="active">							<!-- Search bar -->
			<form action = "./index.php?section=search" method = "POST" class = "navbar-form navbar-right" role = "form">
				<div class = "form-group">
					<input type = "text" placeholder = "Rechercher" name = "keyWord" class = "form-control">
				</div>
				<button type = "submit" class = "btn btn-success" name = "search" value="">
					<i class = "fa fa-search fa-2x">
					</i>
				</button>
					</form>
					</li>
					<li>		<!-- Cloud -->
						<a href="http://share.meetspace.itinet.fr">
							<i class="fa fa-cloud fa-3x"> </i>
						</a>
					</li>
					<li>		<!-- Mail -->
						<a href="http://mail.meetspace.itinet.fr">
							<i class="fa fa-envelope fa-3x"> </i>
						</a>
					</li>
					<li>		<!-- Profil -->
						<a href="./index.php?section=user&amp;part=profil">
							<i class="fa fa-user fa-3x"> </i>
						</a>
					</li>	
					<li>		<!-- Deconnexion -->
						<a href="./C_logout.php">
							<i class="fa fa-sign-out fa-3x"> </i>
						</a>
					</li>
				</ul>
		
			</div>	<!-- Navbar collapse -->

		</div>		<!-- Container -->
		</div>
	</nav>

