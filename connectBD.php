<?php
// Connexion base de données
	$server = "mysql"; // type de serveur
	$host   = "localhost:3308"; // nom de l'hôte
	$base   = "login";//nom de base
	$user   = "root";// login utilisateur
	$passwd = "";// mdp utilisateur


	$pdo = new PDO('mysql:host=localhost:3308;dbname=login;charset=utf8', 'root', '');

	

?>