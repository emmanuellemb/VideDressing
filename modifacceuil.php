<?php

session_start();

	if ($_SESSION['admin']!='admin@gmail.com'){

	

	header('Location:accueil.php');
 	

}



$contenu_du_fichier = file_get_contents('donneesAccueil.txt',FILE_USE_INCLUDE_PATH); //recupere le contenu de donnesAccueil.txt


echo $contenu_du_fichier;


?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TEST</title>
		<link rel="icon" type="image/ico" href="images/favicon.ico" />
		 <script src="\ckeditor\ckeditor.js"></script>

		
	</head>
	<body>
	<br><br><br>
	<form action="savetextacceuil.php" method="POST">	
	
        <p>
            
            <textarea  name="editor1" id="editor1">

            	<?php echo $contenu_du_fichier ?></textarea>
            <script>
				CKEDITOR.replace( "editor1" );
				CKEDITOR.config.height= "auto";
            </script>
        </p>
        
	</form>

	<a href="accueil.php"> Revenir à l'accueil</a>

	</body>
</html>
