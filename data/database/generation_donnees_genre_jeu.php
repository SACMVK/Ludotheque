<?php

function generer_donnees_genre_jeu(int $nombreGenreJeu, int $nombreJeuxT) {
    for ($indice = 1; $indice <= $nombreGenreJeu; $indice++) {
        echo 'INSERT INTO user_prefere_genre (idUser, genre)';
        echo 'VALUES ("' . rand(1, $nombreJeuxT) . '", "' . getGenreJeu() . '");';
        echo '<br>';
    }
}

function getGenreJeu() {
    $pdo = openConnexion();
    $requete = "SELECT * FROM genre;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $liste = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $liste [] = $ligne['genre'];
    }
    closeConnexion($pdo);
    return $liste[rand(0, count($liste) - 1)];
}
