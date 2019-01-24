<?php
	session_start();

	include 'connectBD.php';
	$req = "delete from article where codeArticle = '". $_GET['codeArticle'] . "';";
	$pdostat = $pdo->query($req);

	header('Location: liste.php?codeListe=' . $_GET['codeListe']);
?>	