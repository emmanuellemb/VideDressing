<?php


include 'connectBD.php';

$codeliste=$_GET['id'];	

echo $codeliste;


$req = $pdo->prepare("UPDATE `liste` SET `statut` = 'en vente' WHERE `liste`.`codeListe` = (?) ");
$req -> bindParam(1,$codeliste);
$req->execute();

header('Location:miseEnVente.php');
?>