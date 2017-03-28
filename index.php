<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Ludothèque</title>
        <?php
// Include de la totalité des fichiers css
        //include 'ihm/css/css.php';
        // stefan : Cette ligne permet d'activer et d'entretenir la session ($_SESSION) avec ses variables
        session_start();
        include '_old/saveTexte.php';
        ?>

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
        } else if (empty($_GET['page'])) {
            $pageAAfficher = 'ihm/pages/accueil.php';
        } else if (strpbrk($_GET['page'], '+')) {
            include 'controller/controllerRequete.php';
        } else {
            $pageAAfficher = 'ihm/' . $_GET['page'];
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
            if (empty($_SESSION)) {
                include ('ihm/header/header.php');
            } else {
                include ('ihm/header/headerConnected.php');
            }
            ?></div>
        <!-- ************************************************************************************************ -->
        <!-- ***************************************** HEADER (FIN) ***************************************** -->
        <!-- ************************************************************************************************ -->




        <!-- ************************************************************************************************ -->
        <!--  ********************* MENU A GAUCHE (AFFICHE QU'EN MODE CONNECTE) (DEBUT) ********************* -->
        <!-- ************************************************************************************************ -->
        <div id='div_menu'><?php
            // S'il y a une session d'ouverte, on affiche le menu.
            if (!empty($_SESSION)) {
                // Si le compte a des droits admin, on affiche le menu admin
                if ($_SESSION["droits"] == "admin") {
                    include ('ihm/menus/menuAdmin.php');
                    // Sinon, on affiche le menu connecté simple
                } else {
                    include ('ihm/menus/menuUser.php');
                }
            }
            ?></div>
        <!-- ************************************************************************************************ -->
        <!--  ********************** MENU A GAUCHE (AFFICHE QU'EN MODE CONNECTE) (FIN) ********************** -->
        <!-- ************************************************************************************************ -->





        <!-- ************************************************************************************************ -->
        <!-- ************************************ CONTENU CENTRAL (DEBUT) *********************************** -->
        <!-- ************************************************************************************************ -->
        <div id='div_contenu'><?php include $pageAAfficher; ?></div>
        <!-- ************************************************************************************************ -->
        <!-- ************************************* CONTENU CENTRAL (FIN) ************************************ -->
        <!-- ************************************************************************************************ -->





        <!-- ************************************************************************************************ -->
        <!-- **************************************** FOOTER (DEBUT) **************************************** -->
        <!-- ************************************************************************************************ -->
        <div id='div_footer'><?php
            include ('ihm/footer/footer.php');
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

