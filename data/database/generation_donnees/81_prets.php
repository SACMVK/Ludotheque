<?php

include 'emprunt.php';

function generer_prets(int $nombreEmprunteurs, int $nombreJeuxP) {

    // pour chaque jeu ...
    //for ($indice = 0; $indice < $nombreJeuxP; $indice++) {

    for ($indiceJeu = 1; $indiceJeu <= 1; $indiceJeu++) {
        // .. on détermine un nombre d'emprunt ...


        $nomJeu = getNomJeuT($indiceJeu);
        $idPreteur = getIdPreteur($indiceJeu);
        $nomPreteur = getNomUser($idPreteur);
        $dateInscriptionPreteur = getInscriptionUser($idPreteur);
        $idEmprunteur = rand(0, $nombreEmprunteurs);
        $nomEmprunteur = getNomUser($idEmprunteur);
        $dateInscriptionEmprunteur = getInscriptionUser($idEmprunteur);

        $inscriptionPreteur = dateToJour($dateInscriptionPreteur);
        $inscriptionEmprunteur = dateToJour($dateInscriptionEmprunteur);

        $inscriptionPreteur > $inscriptionEmprunteur ? $inscriptionMax = $inscriptionPreteur : $inscriptionMax = $inscriptionEmprunteur;
        echo "Date Max inscription : " . jourToDate($inscriptionMax) . "<br>";
        $nombreMaxPrets = (int) ($inscriptionMax / 50);
        echo "Nombre max d'emprunts : " . $nombreMaxPrets . "<br>";
        $nombreEmpruntJeuP = rand(0, $nombreMaxPrets);
        echo "Nombre d'emprunts : " . $nombreEmpruntJeuP . "<br>";
        echo "<br>";

        $joursPrets[] = -1;
        $datesPrets = null;

        if ($nombreEmpruntJeuP != 0) {
            for ($indiceEmprunt = 0; $indiceEmprunt < $nombreEmpruntJeuP; $indiceEmprunt++) {
                do {
                    $dateDebutPret = rand($inscriptionMax, dateToJour("2017-08-31"));
                    $dateFinPret = $dateDebutPret + rand(3, 21);
                    $datesPret = [$dateDebutPret, $dateFinPret];
                    $joursPret = null;
                    // Ajout de 5 jours de marges par rapport au décalage entre le prévu et le réel
                    for ($jourPret = $dateDebutPret - 8; $jourPret < $dateFinPret + 8; $jourPret ++) {
                        $joursPret [] = $jourPret;
                    }
                } while (count(array_intersect($joursPret, $joursPrets)) != 0);
                foreach ($joursPret as $jourPret) {
                    $joursPrets [] = $jourPret;
                }
                $datesPrets [] = $datesPret;
            }
        }




        $listeEmprunt = null;
        if ($nombreEmpruntJeuP != 0) {
            // ... pour chaque emprunt, définition de l'emprunt
            for ($indiceEmprunt = 0; $indiceEmprunt < $nombreEmpruntJeuP; $indiceEmprunt++) {
                $emprunt = new emprunt();
                $emprunt->idJeuP = $indiceJeu;
                $emprunt->nomJeu = $nomJeu;
                $emprunt->idPreteur = $idPreteur;
                $emprunt->nomPreteur = $nomPreteur;
                $emprunt->dateInscriptionPreteur = $dateInscriptionPreteur;
                $emprunt->idEmprunteur = $idEmprunteur;
                $emprunt->nomEmprunteur = $nomEmprunteur;
                $emprunt->dateInscriptionEmprunteur = $dateInscriptionEmprunteur;


                // Il y a contre-proposition du prêteur dans 15% des cas
                // Dans les 85%, ce sont les dates de l'emprunteur qui sont validées
                if (rand(0, 100) > 15) {
                    $emprunt->propositionEmprunteurDateDebut = jourToDate($datesPrets[$indiceEmprunt][0]);
                    $emprunt->propositionEmprunteurDateFin = jourToDate($datesPrets[$indiceEmprunt][1]);
                    $emprunt->envoiDateEnvoi = jourToDate($datesPrets[$indiceEmprunt][0] - rand(1, 4));
                    $emprunt->envoiDateReception = jourToDate($datesPrets[$indiceEmprunt][0] + rand(0, 2));
                    $emprunt->retourDateEnvoi = jourToDate($datesPrets[$indiceEmprunt][1] - rand(0, 2));
                    $emprunt->retourDateReception = jourToDate($datesPrets[$indiceEmprunt][1] + rand(1, 4));
                } else {
                    $emprunt->propositionPreteurDateDebut = jourToDate($datesPrets[$indiceEmprunt][0]);
                    $emprunt->propositionPreteurDateFin = jourToDate($datesPrets[$indiceEmprunt][1]);
                    $emprunt->envoiDateEnvoi = jourToDate($datesPrets[$indiceEmprunt][0] - rand(1, 4));
                    $emprunt->envoiDateReception = jourToDate($datesPrets[$indiceEmprunt][0] + rand(0, 2));
                    $emprunt->retourDateEnvoi = jourToDate($datesPrets[$indiceEmprunt][1] - rand(0, 2));
                    $emprunt->retourDateReception = jourToDate($datesPrets[$indiceEmprunt][1] + rand(1, 4));
                    // Pour ces 15%, on recalcule des dates fictives
                    $dateDebutNonValidee = $datesPrets[$indiceEmprunt][0] + rand(-10, 10);
                    $emprunt->propositionEmprunteurDateDebut = jourToDate($dateDebutNonValidee);
                    $emprunt->propositionEmprunteurDateFin = jourToDate($dateDebutNonValidee + rand(3, 21));
                }




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
                        // genererExpedition() créé l'état du jeu physique
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
//            foreach ($listeEmprunt as $emprunt3) {
//                // si demande en cours
//                if ($emprunt3->statut == "En cours") {
//                    $dates = [1, 2];
//                    $emprunt3->propositionEmprunteurDateDebut = $dates[0];
//                    $emprunt3->propositionEmprunteurDateFin = $dates[1];
//                    // si c'est une contrepropostion
//                    if ($emprunt3->notification == 4) {
//                        $emprunt3->propositionPreteurDateDebut = $dates[0];
//                        $emprunt3->propositionPreteurDateFin = $dates[1];
//                    }
//                }
//                // si c'est une demande demande annulée
//                else if ($emprunt->statut == "Annulée") {
//                    $dates = [1, 2];
//                    $emprunt3->propositionEmprunteurDateDebut = $dates[0];
//                    $emprunt3->propositionEmprunteurDateFin = $dates[1];
//                    // si c'est une contrepropostion
//                    if ($emprunt3->notification == 5) {
//                        $emprunt3->propositionPreteurDateDebut = $dates[0];
//                        $emprunt3->propositionPreteurDateFin = $dates[1];
//                    }
//                }
//                // sinon c'est une demande validée
//                else {
//                    $dates = [1, 2];
//                    $emprunt3->propositionEmprunteurDateDebut = $dates[0];
//                    $emprunt3->propositionEmprunteurDateFin = $dates[1];
//                    // 25 % de chance qu'il s'agisse d'une contreproposition
//                    if (rand(0, 100) <= 25) {
//                        $emprunt3->propositionPreteurDateDebut = $dates[0];
//                        $emprunt3->propositionPreteurDateFin = $dates[1];
//                    }
//                }
//            }
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

function dateToJour(string $date) {
    $annee = (int) (explode("-", $date)[0]);
    $mois = (int) (explode("-", $date)[1]) - 1;
    $jours = (int) (explode("-", $date)[2]);
    $listeMois = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    $nombreJours = 0;
    if ($annee == 2017) {
        $mois += 12;
    }
    if ($mois > 1) {
        for ($moisCourant = 0; $moisCourant < $mois; $moisCourant++) {
            $nombreJours += $listeMois[$moisCourant];
        }
    }
    $nombreJours += $jours;
    return $nombreJours;
}

function jourToDate(int $nombreJours) {
    $listeMois = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    $mois = 0;
    while ($nombreJours - $listeMois[$mois] > 0) {
        //echo $nombreJours. " ". $mois. "<br>";
        $nombreJours -= $listeMois[$mois];
        $mois ++;
    }
    $annee = 2016;
    $mois += 1;
    if ($mois > 12) {
        $annee = 2017;
        $mois -= 12;
    }
    return $annee . "-" . $mois . "-" . $nombreJours;
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

function getInscriptionUser($idUser) {
    $pdo = openConnexion();
    $requete = "SELECT * FROM compte JOIN individu ON compte.idUser = individu.idUser WHERE compte.idUser='" . $idUser . "';";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $list = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $list = $ligne ["dateInscription"];
    }
    closeConnexion($pdo);
    return $list;
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
    $statut = null;
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
