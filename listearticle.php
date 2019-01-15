<?php
	session_start();

	include 'connectBD.php';

		function genereId($IdA){

  			$id = substr(str_shuffle('1234567890'), 0, 10);
 			 if( !in_array($id, $arrId) )
   				 return $id;
  				return genereId($IdA);
		} 

    $codeArticle = // faire fonction pour ;
    $codeListe = genereId($codeListe) ;
    $intitulé = $POST['category']
    $prix = (double)$POST['price']
    $commentaire = $POST['message']
    
    $req = $pdo->prepare("INSERT INTO liste (codeListe, statue) VALUES ('$code' , 'Soumise')");
		$req->bindParam(1, $code);
		$req->bindParam(2,'Soumise');
		$req->execute();


  	$req2 = $pdo->prepare("INSERT INTO liste (codeArticle, codeListe, intitulé, prix, statue, commentaire) VALUES ('$codeArticle' ,'$codeListe','$intitulé', '$prix',
  		'en vente','$commentaire')");
		$req2->bindParam(1, $codeArticle);
		$req2->bindParam(2,$code);
		$req2->bindParam(3, $intitulé);
		$req2->bindParam(4, $prix);
		$req2->bindParam(5, 'en vente');
		$req2->bindParam(6, $commentaire);

		$req2->execute();
?>	