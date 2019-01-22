<?php


include 'connectBD.php';

$codeliste=$_GET['id'];	
$codearticle=$_GET['id2'];	


$req = $pdo->prepare("UPDATE `article` SET `statut` = 'non fourni' WHERE `article`.`codeListe` = (?) AND `article`.`codeArticle` = (?) ");
$req -> bindParam(1,$codeliste);
$req -> bindParam(2,$codearticle);
$req->execute();

header('Location:miseEnVente.php');
?>