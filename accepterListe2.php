<?php


include 'connectBD.php';

$codeliste=$_GET['id'];

echo $codeliste;


$req = $pdo->prepare("UPDATE `liste` SET `statut` = 'acceptee' WHERE `liste`.`codeListe` = (?) ");
$req -> bindParam(1,$codeliste);
$req->execute();

header('Location:accepterListe.php');
?>