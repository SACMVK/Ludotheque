<?php
Function openConnexion(){
try{
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
	
	/* la seconde ligne du try demande le nom de la base, le login ainsi que le mdp */
	$db=new PDO('mysql:host=localhost; dbname=ludotheque', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") ); //array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"     cela sert à pouvoir afficher les accents dans phpmyadmin
	$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	die(' Erreur : '.$e->getMessage());
}
}




Function closeConnexion($db){
	$db = null;
}
?>

