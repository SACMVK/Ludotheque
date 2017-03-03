<?php

// Charlotte
// pour la connexion 


Function select($requete) {
    include 'job/dao/connexion_dao_old.php';
    // ouverture de la connexion
    $pdo = openConnexion();

    // declaration variable qui correspond à la table message
    $table = 'message';

// on recupere le contenu de la table message
//prepare =avant query pour éviter faille de sécurité
    $stmt = $pdo->prepare('SELECT * FROM message');

    // execution de la requete
    $stmt->execute();


    // declaration de la variable qui sera retourner à la fin de la fonction
    $listeMessages = array();

    // On affiche chaque entrée une à une( grace a fetch)
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // $texte = $donnees['texte'];
        // $sujet = $donnees['sujet'];
        // $listeMessages[] = new Message($texte);
        echo $donnees['texte'] ."   ". $donnees['sujet'] ."   ". $donnees['typeMessage'];



        closeConnexion($pdo);

        return $listeMessages;
    }
}

?>