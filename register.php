<!DOCTYPE HTML>

<html>
	<head>
		<title>Vide Dressing</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/button_css.css" />
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
			<section class="wrapper style3">
			<div class="inner">
			
			<form method="get" id="formu" action= "traitement.php" onsubmit="return verif(this)">
			<input type="text" placeholder="Prénom" name="user_firstname" id="user_firstname" />
			<input type="text" placeholder="Nom" name="user_name" id="user_name" />
			<input type="email" placeholder="Adresse mail" name="user_email" id="user_email" onkeyup="validate(this);" />
			<input type="password" placeholder="Mot de passe" name="password" id="password" />
			<input type="password" placeholder="Confirmation mot de passe" name="cpassword" id="cpassword" onkeyup="passwordColor(this.value,password.value);"/>
			<button type="submit" id="btn-submit" class="fsSubmitButton">
			Créer le compte
			</button> 
			</div>  
			<div id="error"></div>
			</form>
			</div>

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