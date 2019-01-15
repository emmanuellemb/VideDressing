<?php
	include 'connectBD.php';
	$req = "select email, password from users where email = '". $_GET['mail'] . "'";
	$pdostat = $pdo->query($req);
	$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
	foreach ($result as $r) {
		if(empty($r['email'])) {
			echo "true";
		}
		else {
			echo "false";
		}
	}
?>