<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//FR">
<html>
    <head>
        <title>Ludotheque BTS</title>
        <?php require ('ihm/css/effets.php'); ?>
    </head>   
            <body>

            <?php //require_once ('ihm/header/header.php');?>
            <?php //require_once ('ihm/menus/menuAdmin.php');?>
            <?php  //require_once ('ihm/pages/feedback.php');?>


            <!-- Victor: forms -->
            
            <label>ETAPE 1</label>
            <!-- Premiere demande de la part de l'emprunteur  -->
            <?php require_once ('ihm/forms/form_dem_pret.php');?> 
            
            <label>ETAPE 2</label>
            <!-- Ici le prêteur verifie si les dates lui conviennent. il peut accepter/refuser/proposer
            de nouvelles dates -->
            <?php require_once ('ihm/forms/form_prop_date_pret.php');?>

            <label>ETAPE 2 bis</label>
            <!-- Nouvelle proposition de la part du prêteur si les dates de l'emprunteur ne lui conviennent pas : 
            les propositions de dates s'arrêtes ici-->
            <?php require_once ('ihm/forms/form_prop_new_dates.php');?>
            
            <label>ETAPE 2 ter</label>
            <!-- dernier echange: l'emprunteur accepte ou refuse les dates proposées par le prêteur -->
            <?php require_once ('ihm/forms/form_accept_date.php');?>

            <label>ETAPE 3</label>
            <!-- Form d'envoi du jeu coté prêteur: date d'envoi / commentaire a destination de l'emprunteur -->
            <?php require_once ('ihm/forms/form_envoi_jeu_preteur.php');?>
            
            <label>ETAPE 4</label><label></label>
            <!-- Form de retour du jeu côté prêteur: état du jeu rendu / date de reception / commentaire 
            a destination de l'emprunteur -->
            <?php  require_once ('ihm/forms/form_recep_jeu_emprunteur.php');?>
                        
            <label>ETAPE 5</label>
            <!-- Form de renvoi du jeu côte emprunteur: interet sur le jeu / date de renvoi / commentaire sur le
            jeu / commentaire pour le prêteur -->
            <?php require_once ('ihm/forms/form_rendu_jeu_emprunteur.php');?>
            
            <label>ETAPE 6</label>
            <!-- Form de retour coté prêteur: avis etat du jeu / date de reception / commentaire -->
            <?php require_once ('ihm/forms/form_rendu_jeu_preteur.php');?> 

            
            
            
            
            
            
            <?php //require_once ('ihm/footer/footer.php');?>

    </body>
</html>