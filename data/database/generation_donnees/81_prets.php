<?php

include 'emprunt.php';

function generer_prets(int $nombreEmprunteurs, int $nombreJeuxP, string $aujourdhui) {

    // Création de la liste des emprunts
    $listeEmprunt = null;

    $listeJeux = getAllNomJeux();
    $listeUsers = getAllUsers();
    

    $aujourdhui = dateToJour($aujourdhui);

    // pour chaque jeu ...
    for ($indiceJeu = 1; $indiceJeu <= $nombreJeuxP; $indiceJeu++) {
        // .. on détermine un nombre d'emprunt ...


        $nomJeu = $listeJeux[$indiceJeu]["nom"];
        $idJeuT = $listeJeux[$indiceJeu]["idPC"];
        $idPreteur = $listeJeux[$indiceJeu]["idProprietaire"];
        $nomPreteur = [$listeUsers[$idPreteur]["nom"], $listeUsers[$idPreteur]["prenom"]];
        $dateInscriptionPreteur = $listeUsers[$idPreteur]["dateInscription"];
        $inscriptionPreteur = dateToJour($dateInscriptionPreteur);

        $idEmprunteur = rand(1, $nombreEmprunteurs);
        $nomEmprunteur = [$listeUsers[$idEmprunteur]["nom"], $listeUsers[$idEmprunteur]["prenom"]];
        $dateInscriptionEmprunteur = $listeUsers[$idPreteur]["dateInscription"];
        $inscriptionEmprunteur = dateToJour($dateInscriptionEmprunteur);

        $inscriptionPreteur > $inscriptionEmprunteur ? $inscriptionMax = $inscriptionPreteur : $inscriptionMax = $inscriptionEmprunteur;
        //echo "Date Max inscription : " . jourToDate($inscriptionMax) . "<br>";
        $nombreMaxPrets = (int) ($inscriptionMax / 60);
        //echo "Nombre max d'emprunts : " . $nombreMaxPrets . "<br>";
        $nombreEmpruntJeuP = rand(0, $nombreMaxPrets);
        //echo "Nombre d'emprunts : " . $nombreEmpruntJeuP . "<br>";
        //echo "<br>";

        $joursPrets = null;
        $joursPrets[] = -1;
        $datesPrets = null;
        $datesPrets[] = [-1, -1];


        if ($nombreEmpruntJeuP != 0) {
            // Création liste de dates d'emprunt
            for ($indiceEmprunt = 1; $indiceEmprunt <= $nombreEmpruntJeuP; $indiceEmprunt++) {
                // implantation d'un compteur pour éviter une boucle infinie
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
        if ($nombreEmpruntJeuP != 0) {


            // ... pour chaque emprunt, définition de l'emprunt
            for ($indiceEmprunt = 1; $indiceEmprunt <= $nombreEmpruntJeuP; $indiceEmprunt++) {
                $emprunt = new emprunt();
                $emprunt->idJeuP = $indiceJeu;
                $emprunt->idJeuT = $idJeuT;
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
                } else {
                    $emprunt->propositionPreteurDateDebut = jourToDate($datesPrets[$indiceEmprunt][0]);
                    $emprunt->propositionPreteurDateFin = jourToDate($datesPrets[$indiceEmprunt][1]);
                    // Pour ces 15%, on recalcule des dates fictives
                    $dateDebutNonValidee = $datesPrets[$indiceEmprunt][0] + rand(-10, 10);
                    $emprunt->propositionEmprunteurDateDebut = jourToDate($dateDebutNonValidee);
                    $emprunt->propositionEmprunteurDateFin = jourToDate($dateDebutNonValidee + rand(3, 21));
                }




                // 20% d'annulation
                if (rand(0, 100) < 20) {
                    $emprunt->statut = "Annulée";
                    if ($emprunt->propositionPreteurDateDebut == null) {
                        $emprunt->notification = 3;
                    } else {
                        $emprunt->notification = 5;
                    }
                }
                // Si ce n'est pas annulé, elle est en cours dans 40% des cas
                else if ($datesPrets[$indiceEmprunt][0] > $aujourdhui && rand(0, 100) < 40) {
                    $emprunt->statut = "En cours";
                    if ($emprunt->propositionPreteurDateDebut == null) {
                        $emprunt->notification = 1;
                    } else {
                        $emprunt->notification = 4;
                    }
                    // Sinon elle est validée
                } else {
                    $emprunt->statut = "Validée";
                    $envoiDateEnvoi = $datesPrets[$indiceEmprunt][0] - rand(1, 4);
                    $envoiDateReception = $datesPrets[$indiceEmprunt][0] + rand(0, 2);
                    $retourDateEnvoi = $datesPrets[$indiceEmprunt][1] - rand(0, 2);
                    $retourDateReception = $datesPrets[$indiceEmprunt][1] + rand(1, 4);
                    if ($envoiDateEnvoi > $aujourdhui) {
                        $emprunt->notification = 2;
                        $emprunt->genererExpedition(0);
                    } else if ($envoiDateReception > $aujourdhui) {
                        $emprunt->envoiDateEnvoi = jourToDate($envoiDateEnvoi);
                        $emprunt->notification = 6;
                        $emprunt->genererExpedition(1);
                    } else if ($retourDateEnvoi > $aujourdhui) {
                        $emprunt->envoiDateEnvoi = jourToDate($envoiDateEnvoi);
                        $emprunt->envoiDateReception = jourToDate($envoiDateReception);
                        $emprunt->notification = 7;
                        $emprunt->genererExpedition(2);
                    } else if ($retourDateReception > $aujourdhui) {
                        $emprunt->envoiDateEnvoi = jourToDate($envoiDateEnvoi);
                        $emprunt->envoiDateReception = jourToDate($envoiDateReception);
                        $emprunt->retourDateEnvoi = jourToDate($retourDateEnvoi);
                        $emprunt->notification = 8;
                        $emprunt->genererExpedition(3);
                    } else {
                        $emprunt->envoiDateEnvoi = jourToDate($envoiDateEnvoi);
                        $emprunt->envoiDateReception = jourToDate($envoiDateReception);
                        $emprunt->retourDateEnvoi = jourToDate($retourDateEnvoi);
                        $emprunt->retourDateReception = jourToDate($retourDateReception);
                        $emprunt->notification = 9;
                        $emprunt->genererExpedition(4);
                    }
                }

                $listeEmprunt[] = $emprunt;
            }
        }
    }

    foreach ($listeEmprunt as $idEmprunt => $emprunt2) {
        $idEmprunt += 1;
//                echo $emprunt2;
//                echo "<br>";
        if ($emprunt2->propositionPreteurDateDebut != null) {
            echo 'INSERT INTO pret_p (idJeuP, idEmprunteur, propositionEmprunteurDateDebut, propositionEmprunteurDateFin, propositionPreteurDateDebut, propositionPreteurDateFin, notification, statutDemande )';
            echo 'VALUES ("' . $emprunt2->idJeuP . '", "' . $emprunt2->idEmprunteur . '", "' . $emprunt2->propositionEmprunteurDateDebut . '", "' . $emprunt2->propositionEmprunteurDateFin . '", "' . $emprunt2->propositionPreteurDateDebut . '", "' . $emprunt2->propositionPreteurDateFin . '", "' . $emprunt2->notification . '", "' . $emprunt2->statut . '");';
            echo '<br>';
        } else {
            echo 'INSERT INTO pret_p (idJeuP, idEmprunteur, propositionEmprunteurDateDebut, propositionEmprunteurDateFin, notification, statutDemande )';
            echo 'VALUES ("' . $emprunt2->idJeuP . '", "' . $emprunt2->idEmprunteur . '", "' . $emprunt2->propositionEmprunteurDateDebut . '", "' . $emprunt2->propositionEmprunteurDateFin . '", "' . $emprunt2->notification . '", "' . $emprunt2->statut . '");';
            echo '<br>';
        }
        if ($emprunt2->statut != "Annulée") {
            if ($emprunt2->envoiDateEnvoi == null) {
                echo 'INSERT INTO expedition (idPret)';
                echo 'VALUES ("' . $idEmprunt . '");';
                echo '<br>';
            } else if ($emprunt2->envoiDateReception == null) {
                echo 'INSERT INTO expedition (idPret,  envoiDateEnvoi)';
                echo 'VALUES ("' . $idEmprunt . '", "' . $emprunt2->envoiDateEnvoi . '");';
                echo '<br>';
            } else if ($emprunt2->retourDateEnvoi == null) {
                echo 'INSERT INTO expedition (idPret,  envoiDateEnvoi,  envoiDateReception,  envoiEtatJeu,  envoiPiecesManquantes)';
                echo 'VALUES ("' . $idEmprunt . '", "' . $emprunt2->envoiDateEnvoi . '", "' . $emprunt2->envoiDateReception . '", "' . $emprunt2->envoiEtatJeu . '", "' . $emprunt2->envoiPiecesManquantes . '");';
                echo '<br>';
                echo 'INSERT INTO commentaire_jeu_p (idJeuP, commentaire)';
                echo 'VALUES ("' . $idEmprunt . '", "' . getCommentaire() . '");';
                echo '<br>';
            } else if ($emprunt2->retourDateReception == null) {
                echo 'INSERT INTO expedition (idPret,  envoiDateEnvoi,  envoiDateReception,  envoiEtatJeu,  envoiPiecesManquantes,  retourDateEnvoi)';
                echo 'VALUES ("' . $idEmprunt . '", "' . $emprunt2->envoiDateEnvoi . '", "' . $emprunt2->envoiDateReception . '", "' . $emprunt2->envoiEtatJeu . '", "' . $emprunt2->envoiPiecesManquantes . '", "' . $emprunt2->retourDateEnvoi . '");';
                echo '<br>';
            } else {
                echo 'INSERT INTO expedition (idPret,  envoiDateEnvoi,  envoiDateReception,  envoiEtatJeu,  envoiPiecesManquantes,  retourDateEnvoi,  retourDateReception,  retourEtatJeu,  retourPiecesManquantes)';
                echo 'VALUES ("' . $idEmprunt . '", "' . $emprunt2->envoiDateEnvoi . '", "' . $emprunt2->envoiDateReception . '", "' . $emprunt2->envoiEtatJeu . '", "' . $emprunt2->envoiPiecesManquantes . '", "' . $emprunt2->retourDateEnvoi . '", "' . $emprunt2->retourDateReception . '", "' . $emprunt2->retourEtatJeu . '", "' . $emprunt2->retourPiecesManquantes . '");';
                echo '<br>';
                // Si le jeu a été rendu, l'emprunteur lui donne une note
                echo 'INSERT INTO note_jeu_t (idPC, idUser, note)';
                echo 'VALUES ("' . $emprunt2->idJeuT . '", "' . $emprunt2->idEmprunteur . '", "' . rand(0, 5) . '");';
                echo '<br>';
                // et fait un commentaire
                echo 'INSERT INTO commentaire_p_c_t (idPC, commentaireT, idUser)';
                echo 'VALUES ("' . $emprunt2->idJeuT . '", "' . getCommentaire() . '", "' . $emprunt2->idEmprunteur . '");';
                echo '<br>';
            }
        }
    }
}

function dateToJour(string $date) {
    $annee = (int) (explode("-", $date)[0]);
    $mois = (int) (explode("-", $date)[1]);
    $mois -= 1;
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

//function getIdPreteur($idJeuP) {
//    $pdo = openConnexion();
//    $requete = "SELECT * FROM jeu_p WHERE jeu_p.idJeuP='" . $idJeuP . "';";
//    $stmt = $pdo->prepare($requete);
//    $stmt->execute();
//    $list = null;
//    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
//        $list = $ligne ["idProprietaire"];
//    }
//    closeConnexion($pdo);
//    return $list;
//}
//
//function getNomJeuT($idJeuP) {
//    $pdo = openConnexion();
//    $requete = "SELECT * FROM jeu_p JOIN jeu_t ON jeu_p.idPC = jeu_t.idPC WHERE jeu_p.idJeuP='" . $idJeuP . "';";
//    $stmt = $pdo->prepare($requete);
//    $stmt->execute();
//    $list = null;
//    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
//        $list = $ligne ["nom"];
//    }
//    closeConnexion($pdo);
//    return $list;
//}
//
//function getNomUser($idUser) {
//    $pdo = openConnexion();
//    $requete = "SELECT * FROM compte JOIN individu ON compte.idUser = individu.idUser WHERE compte.idUser='" . $idUser . "';";
//    $stmt = $pdo->prepare($requete);
//    $stmt->execute();
//    $list = null;
//    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
//        $list [] = $ligne ["nom"];
//        $list [] = $ligne ["prenom"];
//    }
//    closeConnexion($pdo);
//    return $list;
//}
//
//function getInscriptionUser($idUser) {
//    $pdo = openConnexion();
//    $requete = "SELECT * FROM compte JOIN individu ON compte.idUser = individu.idUser WHERE compte.idUser='" . $idUser . "';";
//    $stmt = $pdo->prepare($requete);
//    $stmt->execute();
//    $list = null;
//    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
//        $list = $ligne ["dateInscription"];
//    }
//    closeConnexion($pdo);
//    return $list;
//}

function getAllNomJeux() {
    $pdo = openConnexion();
    $requete = "SELECT * FROM jeu_p JOIN  jeu_t ON jeu_p.idPC = jeu_t.idPC;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $list = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $list [$ligne ["idJeuP"]] = ["nom" => $ligne ["nom"], "idProprietaire" => $ligne ["idProprietaire"], "idPC" => $ligne ["idPC"]];
    }
    closeConnexion($pdo);
    return $list;
}

function getAllUsers() {
    $pdo = openConnexion();
    $requete = "SELECT * FROM compte JOIN individu ON compte.idUser = individu.idUser;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $list = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $list [$ligne ["idUser"]] = ["nom" => $ligne ["nom"], "prenom" => $ligne ["prenom"], "dateInscription" => $ligne ["dateInscription"]];
    }
    closeConnexion($pdo);
    return $list;
}
