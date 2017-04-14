<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Ludothèque</title>
    </head>
    <body>
        <?php
        // stefan : fichiers et méthodes de génération de données en masse
        include 'job/dao/Connexion_Dao.php';

        // stefan : Ce n'est pas au bon endroit : comme les méthodes portent le même nom, il va y avoir des conflits
//        include 'job/dao/individu_dao.php';
//        include 'job/dao/jeu_t_dao.php';
//        include 'job/dao/jeu_p_dao.php';
//        include 'job/dao/message_dao.php';

        include '_old/saveTexte.php';
        
        include 'data/database/generation_donnees_individu.php';
        include 'data/database/generation_donnees_jeu_t.php';
        include 'data/database/generation_donnees_jeu_p.php';
        include 'data/database/generation_donnees_message.php';
        include 'data/database/generation_donnees_genre_individu.php';
        include 'data/database/generation_donnees_genre_jeu.php';
        include 'data/database/generation_images.php';
        include 'data/database/generation_donnees_jeu_t_aPourImage.php';
        include 'data/database/generation_donnes_commentaires.php';

        // stefan : on commence par vider les tables ayant des clés étrangères
//        supprimer_donnees_message();
//        supprimer_donnees_jeu_p();
//        supprimer_donnees_individu();
//        supprimer_donnees_jeu_t();
        // stefan : on créé les données en partant des tables dont les autres tables dépendantes
        $nombreIndividus = 1000; //1000
        $nombreMessages = 3000; //3000
        $nombreJeuxP = 5000; //5000
        $nombreJeuxT = 200; //200
        $nombreGenreIndividu = 3000; //3000
        $nombreGenreJeu = 2000; //2000

        $dimensionsImageReduite = [640, 640];
        $repertoireTemp = "data/images/temp/";
        $repertoireVignettes = "data/images/vignettes/";

        $nombrePretsEnCours = 10;
        $nombrePretsFinis = 10;
        $nombreCommentaires_user = 10;
        $nombreCommentaires_pc = 10;
        $nombreCommentaires_jeu_p = 10;// commentaires que sur jeux empruntés
        
        //generer_donnees_individu($nombreIndividus);
        //generer_donnees_jeu_t($nombreJeuxT);
        //generer_donnees_jeu_p($nombreJeuxP, $nombreJeuxT, $nombreIndividus);
        //generer_donnees_message($nombreMessages, $nombreIndividus);
        //generer_donnees_genre_individu($nombreGenreIndividu,$nombreIndividus);
        //generer_donnees_genre_jeu($nombreGenreJeu,$nombreJeuxT);
        //renommerReduireDeplacerFichier($repertoireTemp, $repertoireVignettes, $dimensionsImageReduite)
        //generation_donnees_jeu_t_aPourImage($nombreJeuxT, $repertoireVignettes);
        
        
        generer_prets($nombrePretsEnCours,$nombrePretsFinis, $nombreIndividus, $nombreJeuxP);
        $listeNotation = generer_notation_user($nombrePretsFinis);
        generer_commentaires_user($nombreCommentaires_user, $listeNotation);
        generer_commentaires_pc($nombreCommentaires_pc, $nombreJeuxT, $nombreIndividus);
        generer_commentaires_jeu_p($nombreCommentaires_jeu_p, $nombreJeuxP);
        
        
        
        
        ?>
    </body>
</html>

