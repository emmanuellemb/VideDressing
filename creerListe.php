<?php
	session_start();

	include 'connectBD.php';

	function calculIdListe($code) {
		include 'connectBD.php';

		$req = "select codeListe from liste where codeListe= '" . $code . "';";
		$pdostat = $pdo->query($req);
		$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
		if(empty($result))
			return $code;
		foreach(range('0','9') as $v){
    		$codebis = $code . $v;
    		$req = "select codeListe from liste where codeListe = '" . $codebis . "';";
			$pdostat = $pdo->query($req);
			$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
			if(empty($result)) {
				return $codebis;
			}
		}
		foreach(range('0','9') as $v){
			calculIdListe($code . $v);
		}
	}

	$code = calculIdListe($_SESSION['codeVendeur']);
	$req = "insert into liste values('" . $code . "', '" . $_SESSION['codeVendeur'] . "', 'non soumise');";
	$pdostat = $pdo->query($req);

	header('Location: espacevendeur.php');
?>
	