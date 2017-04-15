<?php

function generer_donnees_genre_jeu(int $nombreGenreJeu, int $nombreJeuxT) {
    for ($indice = 1; $indice <= $nombreGenreJeu; $indice++) {
        
        // stefan : la clé primaire est la somme des deux, il faut vérifier qu'elle est unique
        $listeGenreJeu [] = ["",""];
        do {
            $idJeu = rand(1, $nombreJeuxT);
            $genre = getGenreJeu();
            $genreJeu = [$idJeu,$genre];
        } while (in_array($genreJeu, $listeGenreJeu));
        $listeGenreJeu [] = $genreJeu;


        
        echo 'INSERT INTO jeu_a_pour_genre (idPC, genre)';
        echo 'VALUES ("' . $genreJeu[0] . '", "' . $genreJeu[1] . '");';
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
