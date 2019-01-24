<!DOCTYPE HTML>

<html>
	<head>
		<title>Vide Dressing</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/button_css.css" />
		<link rel="icon" type="image/ico" href="images/favicon.ico" />

	</head>




<body class="landing is-preload">
	 <input type="text" name="rechercher">

            <?php
                session_start();
                include 'header.php';


            ?>
            <br>
              <table>
              <thead> <tr> <th> <font size='20'> VENDRE  <font> </th> <th> <font size='20'>RETIRER<font> </th></tr> 
              	<tr> 
              		<th>

             <form> Entrez le code Article :

             	 <input type="text" name="idArticle" required>

             	</br>

             	Entrez le nom de l'acheteur


             	  <input type="text" name="nomacheteur" required><br>



             	 <input type="submit" name="Recherche" value="Rechercher">

             </form>



             <?php


             include 'connectBD.php';



             if(isset($_GET['idArticle'])){

             	$codeArticle=$_GET['idArticle'];
             	$nomacheteur=$_GET['nomacheteur'];

             	$req = $pdo->prepare("SELECT * FROM article WHERE codeArticle=(?) AND statut='en vente'");
				$req -> bindParam(1,$codeArticle);
				$req->execute();

				echo '<table>';


				while ($row = $req->fetch(PDO::FETCH_ASSOC)){

					echo '<tr><th>'.$row['codeArticle'].'<th>'.$row['prix'].'</th><th>'.'</th><th>'.$row['statut'].'</th><th>'.$row['commentaire'].'</th>';

					echo '<th> <form> <input type="submit" name="vendreArticle" value="Vendre"> </form></th>';
					

					$req = $pdo->prepare("UPDATE `article` SET `statut` = 'vendu' WHERE `article`.`codeArticle` = (?) ");
					$req -> bindParam(1,$codeArticle);
					$req->execute();
					$req2 = $pdo->prepare("INSERT INTO acheteur VALUES ((?),(?)) ");
					$req2-> bindParam(1,$codeArticle);
					$req2-> bindParam(2,$nomacheteur);
					$req2->execute();


				

					echo '</tr>';


				}


				echo '</table>';


             }


            


				





             ?>

         	</th><th><form>

             	Entrez le code Article :

             	 <input type="text" name="idArticle2" required>

             	</br>




             	 <input type="submit" name="Retirer" value="Retirer">

             </form>


              <?php




             if(isset($_GET['idArticle2'])){

             	$codeArticle=$_GET['idArticle2'];

             	$req = $pdo->prepare("SELECT * FROM article WHERE codeArticle=(?) AND statut='en vente'");
				$req -> bindParam(1,$codeArticle);
				$req->execute();

				echo '<table>';


				while ($row = $req->fetch(PDO::FETCH_ASSOC)){

					echo '<tr><th>'.$row['codeArticle'].'<th>'.$row['prix'].'</th><th>'.'</th><th>'.$row['statut'].'</th><th>'.$row['commentaire'].'</th>';


					echo '<th> <form> <input type="submit" name="retirereArticle" value="Retirer"> </form></th>';
					$req = $pdo->prepare("UPDATE `article` SET `statut` = 'retire de la vente' WHERE `article`.`codeArticle` = (?) ");
					$req -> bindParam(1,$codeArticle);
					$req->execute();

				

					echo '</tr>';


				}


				echo '</table>';


             }


             ?>





         </th></tr></thead></table>


		<form> <p><font size='20'>CONSULTER</font></p><br><br>
         
         Saisissez le nom de l'acheteur pour obtenir sa liste d'achat :

         <input type="text" name="nomacheteur" required><br>
         <input type="submit" name="afficherListe" value="Afficher la liste">

		</form>

		<?php


		 if(isset($_GET['nomacheteur'])){

             	$nomacheteur=$_GET['nomacheteur'];

             	$req = $pdo->prepare("SELECT * FROM acheteur NATURAL JOIN article WHERE nomAcheteur=(?) ");
				$req -> bindParam(1,$nomacheteur);
				$req->execute();

				echo "Nom : ";

				echo $nomacheteur;

				echo '<br>';


				echo '<table><thead><tr><th> Code Article </th> <th> Commentaire </th> <th> Prix </th> </tr> </thead>';


				while ($row = $req->fetch(PDO::FETCH_ASSOC)){

					echo '<tr><th>'.$row['codeArticle'].'<th>'.$row['commentaire'].'</th><th>'.$row['prix'].'</th>';

				}


				echo '<tfoot><tr>
				<th id="total" colspan="2">Total :</th>
      			<td>';

      			$req2 = $pdo->prepare("SELECT SUM(prix) AS total FROM acheteur NATURAL JOIN article WHERE nomAcheteur=(?) ");
				$req2-> bindParam(1,$nomacheteur);
				$req2->execute();

				$row2= $req2->fetch(PDO::FETCH_ASSOC);

				echo $row2['total'];



      			echo '</td>
    			</tr></tfoot></table>';


			}





		?>

            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="assets/js/validation.js"></script>





</body></html>
