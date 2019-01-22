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

               	include 'header.php';
             ?>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="assets/js/validation.js"></script>



<?php


include 'connectBD.php';


$req = $pdo->prepare("SELECT * FROM liste, vendeur WHERE statut='soumise'");
$req->execute();

echo '<table>';

while ($row = $req->fetch(PDO::FETCH_ASSOC)){

	

	echo '<tr><th>'.$row['email'].'<th>'.$row['codeVendeur'].'</th><th>'.'</th><th>'.$row['codeListe'].'</th><th>'.$row['statut'].'</th><th>';

	echo "<a href=accepterListe2.php?id=".$row['codeListe']."><input type=\"submit\" value=\"acceptee\" ></a>";

	echo '</th></tr>';

	

}

echo '</table>';




?> </body>
</html>
