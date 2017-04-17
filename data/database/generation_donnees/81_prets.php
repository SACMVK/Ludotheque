<?php

include 'emprunt.php';

function generer_prets(int $nombreEmprunteurs, int $nombreJeuxP) {

    // pour chaque jeu ...
    //for ($indice = 0; $indice < $nombreJeuxP; $indice++) {

    for ($indiceJeu = 1; $indiceJeu <= 1; $indiceJeu++) {
        // .. on détermine un nombre d'emprunt ...
        $nombreEmpruntJeuP = rand(0, 5);
        echo "Nombre d'emprunts : " . $nombreEmpruntJeuP . "<br><br>";
        $listeEmprunt = null;
        if ($nombreEmpruntJeuP != 0) {
            // ... pour chaque emprunt, définition de l'emprunt
            for ($indiceEmprunt = 0; $indiceEmprunt < $nombreEmpruntJeuP; $indiceEmprunt++) {
                $emprunt = new emprunt();
                $emprunt->idJeuP = $indiceJeu;
                $emprunt->nomJeu = getNomJeuT($emprunt->idJeuP);
                $emprunt->idPreteur = getIdPreteur($indiceJeu);
                $emprunt->nomPreteur = getNomUser($emprunt->idPreteur);
                $emprunt->idEmprunteur = rand(0, $nombreEmprunteurs);
                $emprunt->nomEmprunteur = getNomUser($emprunt->idEmprunteur);
                $emprunt->statut = getStatut();

                switch ($emprunt->statut) {
                    case "En cours":
                        (rand(0, 100) <= 25) == 0 ? $emprunt->notification = 1 : $emprunt->notification = 4;
                        break;
                    case "Annulée":
                        (rand(0, 100) <= 25) == 0 ? $emprunt->notification = 3 : $emprunt->notification = 5;
                        break;
                    case "Validée":
                        switch (rand(0, 4)) {
                            case 0:
                                // Validation pas de date supp
                                $emprunt->notification = 2;
                                $emprunt->genererExpedition(0);
                                break;
                            case 1:
                                // Date envoi
                                $emprunt->notification = 6;
                                $emprunt->genererExpedition(1);
                                break;
                            case 2:
                                // " + date réception
                                $emprunt->notification = 7;
                                $emprunt->genererExpedition(2);
                                break;
                            case 3:
                                // " + date renvoi
                                $emprunt->notification = 8;
                                $emprunt->genererExpedition(3);
                                break;
                            case 4:
                                // " + date réception
                                $emprunt->notification = 9;
                                $emprunt->genererExpedition(4);
                                break;
                        }
                        break;
                }
                $listeEmprunt[] = $emprunt;
            }


            // ... pour chaque emprunt calcul des dates d'emprunt si validé
            foreach ($listeEmprunt as $emprunt3) {
                // si demande en cours
                if ($emprunt3->statut == "En cours") {
                    $dates = [1, 2];
                    $emprunt3->propositionEmprunteurDateDebut = $dates[0];
                    $emprunt3->propositionEmprunteurDateFin = $dates[1];
                    // si c'est une contrepropostion
                    if ($emprunt3->notification == 4) {
                        $emprunt3->propositionPreteurDateDebut = $dates[0];
                        $emprunt3->propositionPreteurDateFin = $dates[1];
                    }
                }
                // si c'est une demande demande annulée
                else if ($emprunt->statut == "Annulée") {
                    $dates = [1, 2];
                    $emprunt3->propositionEmprunteurDateDebut = $dates[0];
                    $emprunt3->propositionEmprunteurDateFin = $dates[1];
                    // si c'est une contrepropostion
                    if ($emprunt3->notification == 5) {
                        $emprunt3->propositionPreteurDateDebut = $dates[0];
                        $emprunt3->propositionPreteurDateFin = $dates[1];
                    }
                }
                // sinon c'est une demande validée
                else {
                    $dates = [1, 2];
                    $emprunt3->propositionEmprunteurDateDebut = $dates[0];
                    $emprunt3->propositionEmprunteurDateFin = $dates[1];
                    // 25 % de chance qu'il s'agisse d'une contreproposition
                    if (rand(0, 100) <= 25) {
                        $emprunt3->propositionPreteurDateDebut = $dates[0];
                        $emprunt3->propositionPreteurDateFin = $dates[1];
                    }
                }
            }
            foreach ($listeEmprunt as $emprunt2) {
                echo $emprunt2;
                echo "<br>";
//        echo 'INSERT INTO pret_p (idJeuP, idEmprunteur, propositionEmprunteurDateDebut, propositionEmprunteurDateFin, propositionPreteurDateDebut, propositionPreteurDateFin,notification, statutDemande )';
//        echo 'VALUES (' . rand(1,$nombreJeuxP) . ', ' . rand(1,$nombreEmprunteurs) . ', ' . $dateDebut . ', ' . $dateRendu . ', ' . $jeuRenduATemps . ',' . $notification . ');';
//        echo '<br>'
            }
        }
    }
}

function getIdPreteur($idJeuP) {
    $pdo = openConnexion();
    $requete = "SELECT * FROM jeu_p WHERE jeu_p.idJeuP='" . $idJeuP . "';";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $list = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $list = $ligne ["idProprietaire"];
    }
    closeConnexion($pdo);
    return $list;
}

function getNomJeuT($idJeuP) {
    $pdo = openConnexion();
    $requete = "SELECT * FROM jeu_p JOIN jeu_t ON jeu_p.idPC = jeu_t.idPC WHERE jeu_p.idJeuP='" . $idJeuP . "';";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $list = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $list = $ligne ["nom"];
    }
    closeConnexion($pdo);
    return $list;
}

function getNomUser($idUser) {
    $pdo = openConnexion();
    $requete = "SELECT * FROM compte JOIN individu ON compte.idUser = individu.idUser WHERE compte.idUser='" . $idUser . "';";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $list = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $list [] = $ligne ["nom"];
        $list [] = $ligne ["prenom"];
    }
    closeConnexion($pdo);
    return $list;
}

getDatePret();

function getDatePret() {
    // stefan : on ne peut mettre getDate()['year'] directement à la déclaration
//    if ($dateMax == 0) {
//        $dateMax = getDate()['year'];
//    }
//    $annee = rand($dateMini, $dateMax);
//    $moisMax = 12;
//    if ($annee == getDate()['year']) {
//        $moisMax = intval(getDate()['month']);
//    }
//    $mois = rand(1, $moisMax);
//    $jourMax = 31;
//    if ($mois == 2) {
//        $jourMax = 28;
//    } else if ($mois == 1 || $mois == 3 || $mois == 5 || $mois == 7 || $mois == 8 || $mois == 10 || $mois == 12) {
//        $jourMax = 31;
//    } else {
//        $jourMax = 30;
//    }
//    if ($annee == getDate()['year'] || $mois == getDate()['month']) {
//        $jourMax = intval(getDate()['mday']);
//    }
//    $jour = rand(1, $jourMax);
//    return $annee . "-" . $mois . "-" . $jour;
    $listeMois = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31, 31, 29, 31, 30, 31, 30, 31, 31];
    $nombreJours = 0;
    foreach ($listeMois as $mois) {
        $nombreJours += $mois;
    }
    echo $nombreJours;
    echo "<br>";
    $jourMilieuChoisi = rand(1, $nombreJours);
    echo $jourMilieuChoisi;
    echo "<br>";
    $moitieLongeurPret = rand(1, 10);
    $jourDebut = $jourMilieuChoisi - $moitieLongeurPret;
    $jourFin = $jourMilieuChoisi + $moitieLongeurPret;
    echo "$jourDebut";
    echo "<br>";
    echo "$jourFin";
    echo "<br>";
    $mois = 0;
    while ($jourDebut - $listeMois[$mois] > 0) {
        $jourDebut -= $listeMois[$mois];
        $mois ++;
    }
    $annee = 2016;
    if ($mois > 12) {
        $annee = 2017;
        $mois -= 12;
    }
    echo $annee . "-" . $mois . "-" . $jourDebut;
    echo "<br>";
    $mois = 0;
    while ($jourFin - $listeMois[$mois] > 0) {
        $jourFin -= $listeMois[$mois];
        $mois ++;
    }
    $annee = 2016;
    if ($mois > 12) {
        $annee = 2017;
        $mois -= 12;
    }
    echo $annee . "-" . $mois . "-" . $jourFin;
    echo "<br>";
}

function getStatut() {
    $pdo = openConnexion();
    $requete = "SELECT * FROM statut_demande_d;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $list = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $list [] = $ligne['statut'];
    }
    closeConnexion($pdo);
    $statut;
    $pourcent = rand(0, 100);
    // 15 % en cours
    if ($pourcent < 15) {
        $statut = "En cours";
        // (25-15)=10 % annulé
    } else if ($pourcent < 25) {
        $statut = "Annulée";
        // (100-15-10) = 75 % validée
    } else {
        $statut = "Validée";
    }
    return $statut;
}
