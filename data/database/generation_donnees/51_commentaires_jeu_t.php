<?php

function generer_commentaires_pc(int $nombreCommentaires_pc, int $nombreJeuxT, int $nombreIndividus) {
    for ($indice = 0; $indice < $nombreCommentaires_pc; $indice++) {
        echo 'INSERT INTO commentaire_p_c_t (idPC, commentaireT, idUser)';
        echo 'VALUES ("' . rand(1, $nombreJeuxT) . '", "' . getCommentaire() . '", "' . rand(1, $nombreIndividus) . '");';
        echo '<br>';
    }
}

