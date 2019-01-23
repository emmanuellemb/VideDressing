<?php
	session_start();

	include 'connectBD.php';

	function genereCodeArticle() {
			include 'connectBD.php';
			$req = "select max(codeArticle)+1 from article;";
			$pdostat = $pdo->query($req);
			$result = $pdostat->fetchAll(\PDO::FETCH_ASSOC);
			foreach ($result as $r) {
				foreach ($r as $d) {
					$codeArticle = $d;
				}
			}
			while(strlen($codeArticle) < 4) {
				$codeArticle = '0' . $codeArticle;
			}
			return $codeArticle;
	}

	$codeArticle = genereCodeArticle();
    $codeListe = $_POST['codeListe'];
    $intitule = $_POST['intitule'];
    $prix = $_POST['prix'];
    $commentaire = $_POST['description'];
    $taille = $_POST['taille'];
    $statut = 'non soumis';

	$imagedata = fopen($_FILES['image']['tmp_name'], 'rb');
	$req = 'INSERT INTO article (codeArticle, codeListe, intitule, prix, statut, commentaire, taille, image) VALUES (:codeArticle, :codeListe, :intitule, :prix, :statut, :commentaire, :taille, :image)';
	$result1 = $pdo->prepare($req);
	$result1->bindValue(':codeArticle', $codeArticle);
    $result1->bindValue(':codeListe', $codeListe);
    $result1->bindValue(':intitule', $intitule);
    $result1->bindValue(':prix', $prix);
    $result1->bindValue(':statut', $statut);
    $result1->bindValue(':commentaire', $commentaire);
    $result1->bindValue(':taille', $taille);
    $result1->bindParam(':image', $imagedata, PDO::PARAM_LOB);
    $result1->execute();

	header('Location: liste.php?codeListe=' . $_POST['codeListe']);
?>	