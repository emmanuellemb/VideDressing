<?php
	session_start();

	include 'connectBD.php';

	function calculCode($code) {
		include 'connectBD.php';

		$req = "select codeVendeur from vendeur where codeVendeur = '" . $code . "';";
		$pdostat = $pdo->query($req);
		$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
		if(empty($result))
			return $code;
		foreach(range('A','Z') as $v){
    		$codebis = $code . $v;
    		$req = "select codeVendeur from vendeur where codeVendeur = '" . $codebis . "';";
			$pdostat = $pdo->query($req);
			$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
			if(empty($result)) {
				return $codebis;
			}
		}
		foreach(range('A','Z') as $v){
			calculCode($code . $v);
		}
	}

	$code = $_SESSION['prenom']{0} . $_SESSION['nom']{0} . $_SESSION['nom']{1};
	$code = strtoupper($code);
	$code = calculCode($code);
	echo $code;
	$req = "insert into vendeur values('" . $code . "', '" . $_SESSION['mail'] . "');";
	$pdostat = $pdo->query($req);
	$_SESSION['vendeur'] = true;
	$_SESSION['codeVendeur'] = $code;

	header('Location: accueil.php');
?>