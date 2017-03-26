<?php

//ken : pour pouvoir rechercher quelque chose contenu dans la base de données, il faut d'abord se connecter à la base de données
try{
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
	
	/* ken :  la seconde ligne du try demande le nom de la base, le login ainsi que le mdp */
	$db=new PDO('mysql:host=localhost; dbname=ludotheque', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") ); //array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"     cela sert à pouvoir afficher les accents dans phpmyadmin
	$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	die(' Erreur : '.$e->getMessage());
}






$pdoStat = $db->prepare('SELECT * from individu');

// ken : exécution de la requête
$executeIsOk = $pdoStat->execute();


$contacts = $pdoStat->fetchAll();



?>










<html>
<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="nom.css"/>
</head>






<body>






<form method="post" action="">
<br><br>
<h2><div id="recherchepar">Recherche par nom :</div></h2>
<br><br>




<div class="row">
<div id="contenant">
<div class="col-md-4"><p><div id="un">Rechercher par :</div></p></div>
<div class="col-md-4"><div id="deux">
  <select>
    <option value="nom.php" name="nom"><a href="nom.php">Nom</a></option>
    <option value="adresse.php"><a href="adresse.php">Adresse</a></option>
	<option value="codepostal.php"><a href="codepostal.php">Code postal</a></option>
	<option value="ville.php"><a href="ville.php">Ville</a></option>
    <option value="date.php"><a href="date.php">Date</a></option>
	<option value="regle.php"><a href="regle.php">Réglé</a></option>
	<option value="regle.php"><a href="non_regle.php">Non réglé</a></option>
  </select>
</div></div>

<div class="col-md-4"><div id="trois"><input type="submit" name="valider"/></div></div>

</div>
</div>






<div class="row">
<div id="contenant2">
<div class="col-md-8"><div id="quatre"><input type="search" placeholder="Entrez un mot-clef"  name="the_search"></div></div> <!--placeholder = ce qu'il y aura de noté de base dans l'input --> 
<div class="col-md-4"><div id="cinq"><input type="submit" name="valider"></div></div>
</div>
</div>



</form>
<br><br>



<footer>
<div class="row">
<div class="col-md-3"><p id="adr">24 LE MAGOUËRO 56680 PLOUHINEC </p></div>
<div class="col-md-3"><p id="tel">02 97 85 83 25</p></div>
<div class="col-md-3"><p id="mail">ACCESS@ACCESSWEB.FR</p></div>
<div class="col-md-3"><p id="web">WWW.ACCESSWEB.FR</p></div>
</div>


</footer>




</body>
</html>