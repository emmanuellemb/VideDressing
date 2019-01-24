<?php
	session_start();

	include 'connectBD.php';

	$req = "update liste set statut='soumise' where codeListe = '" . $_GET['codeListe'] . "';";
	$pdostat = $pdo->query($req);

	$req2 = "select codeArticle from article  where codeListe = '" . $_GET['codeListe'] . "';";
	$pdostat = $pdo->query($req2);
	$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
	foreach ($result as $r) {
		$req3 = "update article set statut='soumis' where codeArticle = '". $r['codeArticle'] . "';";
		$pdostat2 = $pdo->query($req3);
	}

	header('Location: espacevendeur.php');

?>