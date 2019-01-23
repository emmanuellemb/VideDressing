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

				<?php

					include 'connectBD.php';

					$req = "select * from liste where codeVendeur = '". $_SESSION['codeVendeur'] . "';";
					$pdostat = $pdo->query($req);
					$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
					echo '<ul class="list" id="list">';
					foreach ($result as $r) {
						echo '<li>';
						echo '<h3 class="project-name">Liste n°' . $r['codeListe'] . '</h3>';
						echo '<p class="project-title">Code vendeur : ' . $r['codeVendeur'] . '</p>';
						echo '<p class="project-label">Statut : ' . $r['statut']. '</p>';
						echo '<a href="liste.php?codeListe=' . $r['codeListe'] . '"><i class="glyphicon glyphicon-pencil"></i></a>';
						echo '<button type="submit" id="btn-submit" class="fsSubmitButton"><a href="supprimerListe.php?codeListe=' . $r['codeListe'] . '">Supprimer</a></button>';
						echo '</li>';
					}
					echo '</ul>';


				?>


    			<?php
					echo '<button type="submit" id="btn-submit" class="fsSubmitButton"><a href="creerListe.php?codeVendeur=' . $_SESSION['codeVendeur'] . '">Ajouter une liste</a></button> '
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