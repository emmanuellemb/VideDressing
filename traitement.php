<?php
	include 'connectBD.php';
	$req = "insert into users values('" . $_GET['user_email'] . "', '" . $_GET['user_firstname'] . "', '" . $_GET['user_name'] . "', '" . $_GET['password'] . "');";
	echo $req;
	$pdostat = $pdo->query($req);
	header('Location: accueil.php');
?>