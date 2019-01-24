<!DOCTYPE HTML>

<html>
	<head>
		<title>Vide Dressing</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/button_css.css" />
		<link rel="icon" type="image/ico" href="images/favicon.ico" />

	</head>
	<body class="landing is-preload">
			<?php
				session_start();
			?>
		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<?php
					include 'header.php';
				?>

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<h2>Vide-Dressing</h2>
							<?php

							 $contenu_du_fichier = file_get_contents('donneesAccueil.txt',FILE_USE_INCLUDE_PATH); //recupere le contenu de donnesAccueil.txt

							echo $contenu_du_fichier;

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

<?php 	
	include 'connectBD.php';

	if(!empty($_GET['user_mail'])) {

		$req = "select email, firstname, lastname from users where email = '". $_GET['user_mail'] . "' and password = '" . $_GET['user_pass'] . "';";
		$pdostat = $pdo->query($req);
		$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);

		session_start();

		$_SESSION['mail'] = $_GET['user_mail'];

		if($_GET['user_mail']=='admin@gmail.com'){

			$_SESSION['admin']=true;

		}
		foreach ($result as $r) {
			$_SESSION['prenom'] = $r['firstname'];
			$_SESSION['nom'] = $r['lastname'];
		}

		$req2 = "select codeVendeur, email from vendeur where email = '". $_GET['user_mail'] . "';";
		$pdostat = $pdo->query($req2);
		$result2 = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
		$_SESSION['vendeur'] = false;
		foreach ($result2 as $r) {
			if(!empty($r['email'])) {
				$_SESSION['vendeur'] = true;
				$_SESSION['codeVendeur'] = $r['codeVendeur'];
			}
		}
	

		header('Location: accueil.php');
	}
?>
