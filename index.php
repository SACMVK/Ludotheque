<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Ludothèque</title>
        <?php
// Include de la totalité des fichiers css
        include 'ihm/css/css.php';
        ?>




        <?php
// stefan : liste des fichiers à inclure
//        include 'job/dao/connexion_dao.php';
//        include 'job/dao/config_dao.php';
//        include 'job/dao/droits_dao.php';

        /* stefan : récupération de la configuration enregistrée
         * ainsi que de la liste des droits dans la base de données.
         */
//        $config = loadConfig();
//        $liste_droits = loadDroits();
        ?>

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
        <div id='div_contenu'><?php
            /* stefan : On récupère par $_GET['page'],
             * - ou bien une page à afficher directement
             * - ou bien un appel au contrôleur si la chaine contient "+"
             * par ex : Individu+selectOne
             */
            if (empty($_GET['page'])) {
                include('ihm/pages/accueil.php');
            } else if (strpbrk($_GET['page'], '+')) {
                include 'controller/controller.php';
            } else {
                include'ihm/' . $_GET['page'];
            }
            ?></div>
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

        <!--
        <div><?php //include 'ihm/pages/connexion.php';          ?></div>
        <div><?php //include 'ihm/pages/config.php';          ?></div>
        -->




        <?php
// Include de la totalité des fichiers js
        include 'ihm/js/js.php';
        ?>

    </body>
</html>

