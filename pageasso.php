<!DOCTYPE HTML>

<html>
	<head>
		<title>Glazik gym</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/button_css.css" />
		<link rel="icon" type="image/ico" href="images/favicon.ico" />

	</head>
	<body class="is-preload">

		<?php
				session_start();
			?>

		<!-- Page -->
			<div id="page-wrapper">

				<!-- Header -->
				<?php
					include 'header.php';
				?>

				<!-- Main -->
					<article id="main">
						<header>
							<h2>Glazik gym</h2>
							<p>L’association organise un vide dressing tout les ans.</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">

								<?php

							 	$contenu_du_fichier = file_get_contents('donneesPageasso.txt',FILE_USE_INCLUDE_PATH); //recupere le contenu de donneesPageasso.txt

								echo $contenu_du_fichier;

								?>


							</div>
						</section>
					</article>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php 	
	include 'connectBD.php';

	if(!empty($_GET['user_mail'])) {

		$req = "select email, firstname, lastname from users where email = '". $_GET['user_mail'] . "' and password = '" . $_GET['user_pass'] . "';";
		$pdostat = $pdo->query($req);
		$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);

		session_start();

		$_SESSION['mail'] = $_GET['user_mail'];
		foreach ($result as $r) {
			$_SESSION['prenom'] = $r['firstname'];
			$_SESSION['nom'] = $r['lastname'];
		}

		$req2 = "select email from vendeur where email = '". $_GET['user_mail'] . "';";
		$pdostat = $pdo->query($req2);
		$result2 = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
		$_SESSION['vendeur'] = false;
		foreach ($result2 as $r) {
			if(!empty($r['email'])) {
				$_SESSION['vendeur'] = true;
			}
		}
	

		header('Location: accueil.php');
	}
?>
