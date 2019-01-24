<?php
	session_start();

	include 'connectBD.php';
	$req = "delete from liste where codeListe = '". $_GET['codeListe'] . "';";
	$pdostat = $pdo->query($req);

	header('Location: espacevendeur.php');
?>	