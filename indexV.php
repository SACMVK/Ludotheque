<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//FR">
<html>
    <head>
        <title>Ludotheque BTS</title>
        <?php require ('ihm/css/_old/effets.php'); ?>
    </head>   
            <body>




            <!-- Victor: forms -->
            
            ETAPE 1 : 1_demande_emprunt
            <br>
            <br>
            <!-- Premiere demande de la part de l'emprunteur  -->
            <?php require_once ('ihm/pret/1_demande_emprunt.php');?>
            <br>
            <br>
            
            ETAPE 2 : 2_reponse_emprunt
            <br>
            <br>
            <!-- Ici le prêteur verifie si les dates lui conviennent. il peut accepter/refuser/proposer
            de nouvelles dates -->
            <?php require_once ('ihm/pret/2_reponse_emprunt.php');?>
            <br>
            <br>

            ETAPE 3 : 3_proposition_nouvelles_dates
            <br>
            <br>
            <!-- Nouvelle proposition de la part du prêteur si les dates de l'emprunteur ne lui conviennent pas : 
            les propositions de dates s'arrêtes ici-->
            <?php require_once ('ihm/pret/3_proposition_nouvelles_dates.php');?>
            <br>
            <br>
            
            ETAPE 4 : 4_reponse_nouvelles_dates
            <br>
            <br>
            <!-- dernier echange: l'emprunteur accepte ou refuse les dates proposées par le prêteur -->
            <?php require_once ('ihm/pret/4_reponse_nouvelles_dates.php');?>
            <br>
            <br>

            ETAPE 5 : 5_preteur_envoie_jeu
            <br>
            <br>
            <!-- Form d'envoi du jeu coté prêteur: date d'envoi / commentaire a destination de l'emprunteur -->
            <?php require_once ('ihm/pret/5_preteur_envoie_jeu.php');?>
            <br>
            <br>
            
            ETAPE 6 : 6_emprunteur_recoit_jeu
            <br>
            <br>
            <!-- Form de retour du jeu côté prêteur: état du jeu rendu / date de reception / commentaire 
            a destination de l'emprunteur -->
            <?php  require_once ('ihm/pret/6_emprunteur_recoit_jeu.php');?>
            <br>
            <br>
                        
            ETAPE 7 : 7_emprunt_renvoie_jeu
            <br>
            <br>
            <!-- Form de renvoi du jeu côte emprunteur: interet sur le jeu / date de renvoi / commentaire sur le
            jeu / commentaire pour le prêteur -->
            <?php require_once ('ihm/pret/7_emprunt_renvoie_jeu.php');?>
            <br>
            <br>
            
            ETAPE 8 : 8_preteur_recoit_jeu
            <br>
            <br>
            <!-- Form de retour coté prêteur: avis etat du jeu / date de reception / commentaire -->
            <?php require_once ('ihm/pret/8_preteur_recoit_jeu.php');?>
            <br>
            <br>

            
            
            


    </body>
</html>