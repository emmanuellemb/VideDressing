<?php 	
	
	session_start();

	if ($_SESSION['admin']!=true){

		header('Location:accueil.php'); // si on est pas admin on retourne à l'accueil

	}

?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>Vide Dressing</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/button_css.css" />
		<link rel="icon" type="image/ico" href="images/favicon.ico" />


		<script type="text/javascript"> 

			function verifForm(){

				if(document.forms['formu'].elements['user_firstname'].value==''){AllIsOk++;}

				if(document.forms['formu'].elements['user_name'].value==''){AllIsOk++;}

				if(document.forms['formu'].elements['user_email'].value==''){AllIsOk++;}

				if ( AllIsOk !=0){

					alert("Tout les champs ne sont pas remplis !");

					return false;
				}

				return true;



			}


		</script>


	</head>
	<body class="landing is-preload">

			
		<!-- Page Wrapper -->
			<div id="page-wrapper">

			<!-- Header -->
				<?php
					include 'header.php';
				?>

			<!-- Main -->	
			<section class="wrapper style3">
			<div class="inner">
			
			<form method="get" id="formu" name="formu" 	action= "traitement.php" onsubmit="return verifForm()">
			<input type="text" placeholder="Prénom" name="user_firstname" id="user_firstname" class="required"/>
			<input type="text" placeholder="Nom" name="user_name" id="user_name" />
			<input type="email" placeholder="Adresse mail" name="user_email" id="user_email" onkeyup="validate(this);" />
			<input type="password" placeholder="Mot de passe" name="password" id="password" />
			<input type="password" placeholder="Confirmation mot de passe" name="cpassword" id="cpassword" onkeyup="passwordColor(this.value,password.value);"/>
			<input type="submit" id="btn-submit" class="fsSubmitButton" value="Creer le compte"/>
			
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
	



