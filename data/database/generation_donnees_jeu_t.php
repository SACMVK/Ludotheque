<?php

function supprimer_donnees_jeu_t() {
    $pdo = openConnexion();
    $requeteDelete = "DELETE * FROM jeu_t";
    $stmt = $pdo->prepare($requeteDelete);
    $stmt->execute();
    $requeteDelete = "DELETE * FROM produit_culturel_t";
    $stmt = $pdo->prepare($requeteDelete);
    $stmt->execute();
    closeConnexion($pdo);
}



function generer_donnees_jeu_t(int $nombreJeuxT){
    for ($indice = 0; $indice<$nombreJeuxT; $indice++)
    {
        //insert($list);
    }
}
