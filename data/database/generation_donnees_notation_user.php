<?php

function generer_notation_user() {
    for ($indice = 0; $indice < $nombrePretsEnCours; $indice++) {
        echo 'INSERT INTO notation_user (idUser, idNoteur, notation, typeNoteur)';
        echo 'VALUES("' . $idUser . '", "' . $idNoteur . '", "' . $notation . '", "' . getTypeNoteur() . '");';
        echo '<br>';
        $listeNotation[] = [];
    }
}

function getTypeNoteur() {
    if (rand(0, 1) == 0) {
        $typeNoteur = "Emprunteur";
    } else {
        $typeNoteur = "Prêteur";
    }
    return $typeNoteur;
}
