<!DOCTYPE HTML>

<html>
	<head>
		<title>Vide Dressing</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/button_css.css" />
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body class="landing is-preload">

			<?php
				session_start();
			?>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

			<!-- Header -->
				<?php
					include 'header.php';
				?>

			<!-- Main -->	
			<section class="wrapper style1">
			<div class="inner">

			</div>
			</section>

			<section class="wrapper style5">
			<div class="inner">

				<a href="espacevendeur.php">
				<div title="Retour" class="backArrow">
   				&#10140;
  				</div>
  				</a>

				<?php

					include 'connectBD.php';

					$cptArticle = 0;

					$req2 = "select statut from liste where codeListe = '". $_GET['codeListe'] . "';";
					$pdostat2 = $pdo->query($req2);
					$result2 = $pdostat2->fetchAll(\PDO::FETCH_ASSOC);

					$req = "select * from article where codeListe = '". $_GET['codeListe'] . "';";
					$pdostat = $pdo->query($req);
					$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
					echo '<ul class="list b" id="list">';
					foreach ($result as $r) {
						echo '<li>';
						echo '<h3 class="project-name">' . $r['intitule'] . '</h3>';
						if(!empty($r['image']))
							echo '<img src="data:image/jpeg;base64,'.base64_encode( $r['image'] ).'"/>';
						echo '<p class="project-title">Prix : ' . $r['prix'] . '€</p>';
						echo '<p class="project-title">Taille: ' . $r['taille'] . '</p>';
						echo '<p class="project-title">Commentaire : ' . $r['commentaire'] . '</p>';
						echo '<p class="project-label">Statut : ' . $r['statut']. '</p>';
						echo '<button type="submit" id="btn-submit" class="fsSubmitButton"><a href="supprimerArticle.php?codeArticle=' . $r['codeArticle'] . '&codeListe=' . $_GET['codeListe'] . '">Supprimer</a></button>';
						echo '</li>';
						$cptArticle++;
					}
					echo '</ul>';

					foreach ($result2 as $r2) {
						if($r2['statut'] != 'soumis') {
							echo '<button type="submit" id="btn-submit" class="fsSubmitButton"><a href="ajouterArticle.php?codeListe=' . $_GET['codeListe'] . '">Ajouter un article</a></button> ';
							echo '<div class="wrap">';
							if($cptArticle > 0) {
  								echo '<button class="mysubmit"><a href="soumettreListe.php?codeListe=' . $_GET['codeListe'] . '">Soumettre liste</a></button>';
								echo '</div>';
							}
						}
					}

				?>

			</div>
			</section>


			<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/validation.js"></script>

	</body>
</html>