
<?php



$fp = fopen ("donneesAccueil.txt", "r+");

$contenu_du_textarea = $_POST['editor1'];

fseek ($fp, 0);


ftruncate($fp,0);	


fputs ($fp, $contenu_du_textarea);


fclose ($fp);


header("Location:modifacceuil.php");

?>