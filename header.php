

<!-- Header -->
<header id="header" class="alt">
	<h1><a href="accueil.php">Bienvenue</a></h1>
		<nav id="nav">
			<ul>
				<li class="special">
					<a href="#menu" class="menuToggle"><span>Menu</span></a>
					<div id="menu">
						<ul>
							<li><a href="accueil.php">Accueil</a></li>
							<li><a href="pageasso.php">Présentation association</a></li>
							<li><a href="register.php">S'inscrire</a></li>
							<?php
								if(isset($_SESSION['mail'])) {
									if($_SESSION['vendeur'] == false && $_SESSION['mail'] != "admin@gmail.com") {
										echo '<li><a href="vendeur.php">Devenir vendeur</a></li>';
									}
									else {
										if($_SESSION['mail'] == "admin@gmail.com"){

											echo '<li><a href="modifacceuil.php">Modifier Page d\'accueil</a></li>';
											echo '<li><a href="modifpageasso.php">Modifier Page de Présentation</a></li>';
											echo '<li><a href="ajoutercompte.php">Ajouter compte client</a></li>';
											echo '<li><a href="accepterListe.php">Accepter Liste</a></li>';
											echo '<li><a href="miseEnVente.php">Jour de Vente</a></li>';
											echo '<li><a href="vente.php">La vente</a></li>';

										}else{

											echo '<li><a href="espacevendeur.php">Espace vendeur</a></li>';
										}
										
									}
									echo '<li><a href="deconnect.php">Se deconnecter</a></li>';
								}
								else {
									echo '<li>
										<form method="get" id="formlogin" action="accueil.php" onsubmit="return verifConnect(this)">
										<input type="email" placeholder="Adresse mail" name="user_mail" id="user_mail" />
										<input type="password" placeholder="Mot de passe" name="user_pass" id="user_pass" />
										<button type="submit" id="btn-submit" class="fsSubmitButton">Se connecter</button>
										</form>
										<div id="error"></div>
										</li>';
									}
								?>
								<?php
									if(isset($_SESSION['mail'])) {
										echo '<li>' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'];
										echo '<br/>';
									if($_SESSION['vendeur'] == true) {
										echo '<div class="type">VENDEUR</div>';
									}
									echo '</li>';
								}
							?>
						</ul>
					</div>
			</li>
		</ul>
	</nav>
</header>