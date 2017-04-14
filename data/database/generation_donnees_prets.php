<?php

function generer_prets(int $nombrePretsEnCours, int $nombrePretsFinis, int $nombreIndividus, int $nombreJeuxP) {
    for ($indice = 0; $indice < $nombrePretsEnCours; $indice++) {
        echo 'INSERT INTO pret_p (idJeuP, idEmprunteur, dateDebut, dateRendu, jeuRenduATemps, notification)';
        echo 'VALUES (' . rand(1,$nombreJeuxP) . ', ' . rand(1,$nombreIndividus) . ', ' . $dateDebut . ', ' . $dateRendu . ', ' . $jeuRenduATemps . ',' . $notification . ');';
        echo '<br>';
    }
        for ($indice = 0; $indice < $nombrePretsFinis; $indice++) {
        echo 'INSERT INTO pret_p (idJeuP, idEmprunteur, dateDebut, dateRendu, jeuRenduATemps, notification)';
        echo 'VALUES (' . rand(1,$nombreJeuxP) . ', ' . rand(1,$nombreIndividus) . ', ' . $dateDebut . ', ' . $dateRendu . ', ' . $jeuRenduATemps . ',' . $notification . ');';
        echo '<br>';
    }
}
