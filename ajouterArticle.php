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
				echo '<a href="liste.php?codeListe=' . $_GET['codeListe'] . '">
				<div title="Retour" class="backArrow">
   				&#10140;
  				</div>
  				</a>';
  				?>


				<form method="post" id="formu" action= "creerArticle.php" onsubmit="return verif(this)" enctype="multipart/form-data">
				Image : <input name="image" type="file" id="image" />
				<br/>
				Intitulé :    <input type="text" placeholder="Intitulé" name="intitule" id="intitule" required/>
				Prix en euros : <input type="text" placeholder="Prix en euros (exemple : 5)" name="prix" id="prix" required/>
				Taille :      <input type="text" placeholder="Taille" name="taille" id="taille" required/>
				Description : <input type="text" placeholder="Description" name="description" id="description" />

				<input type="hidden" name="codeListe" id="codeListe" value="<?php echo $_GET['codeListe']; ?>" />

				<button type="submit" id="btn-submit" class="fsSubmitButton">
				Ajouter l'article
				</button> 

				</div>  
				<div id="error"></div>
				</form>

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