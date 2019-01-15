<?php
	include 'connectBD.php';

	$req = "select email, password from users where email = '". $_GET['mail'] . "' and password = '" . $_GET['pass'] . "';";
	$pdostat = $pdo->query($req);
	$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
	foreach ($result as $r) {
		if(!iempty($r['email'])) {
			echo "true";
		}
	}
	echo "false";
?>
