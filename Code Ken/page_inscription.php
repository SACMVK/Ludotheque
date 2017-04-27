<?php
session_start();
require('connexion_bdd.php'); //on se connecte à la BDD grâce au fichier connexion_bdd.php




//réception des données du formulaire
//pour la table compte (les variables doivent être dans l'ordre des lignes de la table correspondante)
$Adresse=$_POST['adresse']; // ce qu'il y a entre crochets, c'est les noms donnés dans les input du fichier html
$Ville=$_POST['ville'];
$Mail=$_POST['mail'];
$Tel=$_POST['tel'];
$Pseudo=$_POST['pseudo']; 
$MotDePasse=$_POST['motdepasse'];
/* $MotDePasse2=$_POST['motdepasse2']; */
$CodePostal=$_POST['codepostal'];






//pour la table individu
$Nom=$_POST['nom'];
$Prenom=$_POST['prenom'];
$DateNaissance=$_POST['datenaissance'];
$Sexe=$_POST['sexe'];





//insertion des données reçues dans la base de données

//pour la table compte
$insert2=$db->prepare("INSERT INTO compte(Adresse, Ville, Email, Telephone, Pseudo, mdp, CodePostal) VALUES(?,?,?,?,?,?,?)");

//pour la table individu
$insert=$db->prepare("INSERT INTO individu(Nom, Prenom, DateNaissance, Sexe) VALUES(?,?,?,?)");


//pour la table compte
$insert2->execute(array($Adresse, $Ville, $Mail, $Tel, $Pseudo, $MotDePasse, $CodePostal));
//pour la table individu
$insert->execute(array($Nom, $Prenom, $DateNaissance, $Sexe));

header('Location:page_inscription.html');
?>