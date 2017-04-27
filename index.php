<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Ludothèque</title>
        <?php
// Include de la totalité des fichiers css
        //include 'ihm/css/css.php';
        //
        // stefan : Cette ligne permet d'activer et d'entretenir la session ($_SESSION) avec ses variables
        session_start();
        // stefan : Ce fichier permet d'enregistrer des variables en cours d'exécution (je ne sais pas me servir du mode debug
        include '_old/saveTexte.php';
        include 'job/dao/fonctions_dao.php';
        ?>
        <!-- stefan : ccs juste pour les tests fonctionnels -->
        <link rel="stylesheet" type="text/css" href="ihm/css/A_gestion4blocs.css">

        <!-- ************************************************************************************************ -->
        <!-- ************************************** CONTROLEUR (DEBUT) ************************************** -->
        <!-- ************************************************************************************************ -->

        <?php
        /* stefan : On récupère par $_GET['page'],
         * - ou bien une page à afficher directement
         * - ou bien un appel au contrôleur si la chaine contient "+"
         * par ex : Individu+selectOne
         * On récupère par $_POST["connexion"] et $_GET["connexion]
         * les demandes de connexions (avec pseudo et mdp)
         * et de déconnexion
         */
        if (!empty($_POST['connexion'])) {
            include 'controller/controllerConnexion.php';
        } else if (!empty($_GET['connexion'])) {
            include 'controller/controllerDeconnexion.php';
        } else if (!empty($_GET['page'])) {
            $pageAAfficher = 'ihm/' . $_GET['page'];
        } else if (strpbrk($_GET['page'], '+')) {
            include 'controller/controllerRequete.php';
        } else {
            $pageAAfficher = 'ihm/pages/accueil.php';
        }
        ?>

        <!-- ************************************************************************************************ -->
        <!-- *************************************** CONTROLEUR (FIN) *************************************** -->
        <!-- ************************************************************************************************ -->      

    </head>


    <body>
        <!-- ************************************************************************************************ -->
        <!-- **************************************** HEADER (DEBUT) **************************************** -->
        <!-- ************************************************************************************************ -->

        <div id='div_header'><?php
        include ('ihm/header/header.php');
        ?></div>

        <!-- ************************************************************************************************ -->
        <!-- ***************************************** HEADER (FIN) ***************************************** -->
        <!-- ************************************************************************************************ -->




        <!-- ************************************************************************************************ -->
        <!--  ********************* MENU A GAUCHE (AFFICHE QU'EN MODE CONNECTE) (DEBUT) ********************* -->
        <!-- ************************************************************************************************ -->

        <!-- stefan : S'il y a une session d'ouverte, on affiche le menu -->
        <?php if (!empty($_SESSION)): ?>
            <div id='div_menu'><?php
            // stefan : Si le compte a des droits admin, on affiche d'abord le menu admin
            if ($_SESSION["droits"] == "admin") {
                include ('ihm/menus/menuAdmin.php');
            }
            // stefan : Puis on affiche le menu user
            include ('ihm/menus/menuUser.php');
            ?></div>
            <?php endif; ?>

        <!-- ************************************************************************************************ -->
        <!--  ********************** MENU A GAUCHE (AFFICHE QU'EN MODE CONNECTE) (FIN) ********************** -->
        <!-- ************************************************************************************************ -->





        <!-- ************************************************************************************************ -->
        <!-- ************************************ CONTENU CENTRAL (DEBUT) *********************************** -->
        <!-- ************************************************************************************************ -->

        <?php
        $classEspace = "div_contenuSansMenu";
        if (!empty($_SESSION)) {
            $classEspace = "div_contenuAvecMenu";
        }
        ?>
        <div id= <?php echo $classEspace; ?> > <?php include $pageAAfficher; ?></div>

        <!-- ************************************************************************************************ -->
        <!-- ************************************* CONTENU CENTRAL (FIN) ************************************ -->
        <!-- ************************************************************************************************ -->





        <!-- ************************************************************************************************ -->
        <!-- **************************************** FOOTER (DEBUT) **************************************** -->
        <!-- ************************************************************************************************ -->
        
        <div id='div_footer'><?php
        include 'ihm/footer/footer.php';
        ?></div>
        
        <!-- ************************************************************************************************ -->
        <!-- ***************************************** FOOTER (FIN) ***************************************** -->
        <!-- ************************************************************************************************ -->






        <?php
// Include de la totalité des fichiers js
//include 'ihm/js/js.php';
        ?>

    </body>
</html>

