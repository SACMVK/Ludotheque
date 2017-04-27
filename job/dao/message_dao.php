<?php

include 'job/dao/Connexion_Dao.php';
// ouverture de la connexion
// // declaration variable qui correspond à la table message
$table = 'message';

// Charlotte
// function select == function find()
Function select($requete) {

    $pdo = openConnexion();
    $table = 'message';


// on recupere le contenu de la table message
//prepare =avant query pour éviter faille de sécurité
    $stmt = $pdo->prepare("SELECT * FROM " . $table . ";");

// execution de la requete
    $stmt->execute();


// declaration de la variable qui sera retourner à la fin de la fonction
    $listeMessages = array();

// On affiche chaque entrée une à une( grace a fetch)
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {

// creation des variable correspondant aux attributs de la class Message
        $idMessage = $requete['idMessage'];
        $idExped = $requete['idExped'];
        $idDest = $requete['idDest'];
        $texte = $requete['texte'];
        $sujet = $requete['sujet'];
        $dateEnvoi = $requete['dateEnvoi'];




        $listeMessages[] = new Message($idExped, $idDest, $dateEnvoi, $sujet, $texte, $idMessage);
//echo $donnees['texte'] ."   ". $donnees['sujet'] ."   ". $donnees['typeMessage'];
// fermeture de la connexion
        closeConnexion($pdo);

// retourne la liste de messages
        return $listeMessages;
    }
}

// &$ = passage par reference
//  = Vous pouvez passer une variable par référence à une fonction, de manière à ce que celle-ci puisse la modifier
Function insert($requete) {


// ouverture de la connexion
    $pdo = openConnexion();

    $table = 'message';

// on recupere le contenu de la table message
//prepare =avant query pour éviter faille de sécurité
    $stmt = $pdo->prepare("INSERT INTO " . $table . "(idExped, idDest, dateEnvoi, sujet, texte) VALUES( :idExped, :idDest, :dateEnvoi, :sujet, :texte )");

// execution de la requete
    $stmt->execute(array(
        "idExped" => $requete['idExped'],
        "idDest" => $requete['idDest'],
        "dateEnvoi" => $requete['dateEnvoi'],
        "sujet" => $requete['sujet'],
        "texte" => $requete['texte']
    ));

//$id = getMaxId($table);
//$message new Message ();

    closeConnexion($pdo);
}

// pour Modifier la table
Function alter($requete) {
// ouverture de la connexion
    $pdo = openConnexion();

// declaration variable qui correspond à la table message
    $table = 'message';



    $stmt = $pdo->prepare("UPDATE " . $table . " SET 'idExped' = :idExped, 'idDest' = :idDest, 'dateEnvoi' = :dateEnvoi, 'sujet' = :sujet, 'texte' = :texte, 'idMessage' = :idMessage)");

    $stmt->execute(array(
        ":idExped" => $requete['idExped'],
        ":idDest" => $requete['idDest'],
        ":dateEnvoi" => $requete['dateEnvoi'],
        ":sujet" => $requete['sujet'],
        ":texte" => $requete[texte],
        ":idMessage" => $requete['idMessage']
    ));
    //echo ("le message a été modifié");



    closeConnexion($pdo);
}

function delete($id) {
    $pdo = openConnexion();
    $table = 'message';

// 
//prepare =avant query pour éviter faille de sécurité
    $requeteDelete = "DELETE  FROM " . $table . " WHERE idMessage = :idMessage ;";
    $stmt = $pdo->prepare($requeteDelete);

    $stmt->bindValue(':idMessage',$id);
    
    
    
// execution de la requete
    $stmt->execute();


    closeConnexion($pdo);
}




?>