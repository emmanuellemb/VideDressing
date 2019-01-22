<!DOCTYPE HTML>

<html>
	<head>
		<title>Vide Dressing</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/button_css.css" />
		<link rel="icon" type="image/ico" href="images/favicon.ico" />

	</head>



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




?> 