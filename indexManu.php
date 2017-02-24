<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta charset="UTF-8" />
    <link rel="stylesheet" href="/ihm/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ihm/css/MUSA_carousel-extended.css">
    <link rel="stylesheet" href="/ihm/css/Navigation-with-Button1.css">
    <link rel="stylesheet" href="/ihm/css/styles.css">
    
<title>Ludotheque BTS</title>

<?php require ('./ihm/pages/effets.php'); ?>
</head>


<body>


<?php
include ('ihm/header/header.php');

//require_once('ihm/menus/menuAdmin.php');//
include ('ihm/footer/footer.php');


/* charlotte : empty ne fonctionne pas car il vérifie si $_GET['page']=null, hors $_GET['page'] n'existe pas
 * in_array ne fonctionne pas non plus, pour une raison indéterminée
 * isset (is set) vérifie non =null mais vérifie si la variable existe ou pas avec une valeur
 */ 


if (!(isset($_GET['page']))){
    include('ihm/pages/accueil.php');
}
else {
    include'ihm/pages/'.$_GET['page'].'.php';
}
?>


    <script src="../ihm/js/boostrap.js"></script>
    <script src="../ihm/js/jquery-3.1.1.min.js"></script>
     <script src="ihm/js/jquery.min.js"></script>
    <script src="ihm/js/bootstrap.min.js"></script>
    <script src="ihm/js/MUSA_carousel-extended.js"></script>

    <?php
    // On recupere la calss individu pour instancier de nouveaux users que l'on va rajouter à une liste d'users
    include ('ihm/pages/resultsSearchGame.php');
    $jeuT1 = new Jeu_T(2,6,"Contrast","Pink Monkey Games","Chaque joueur ne dispose que de 8 des 12 symboles pour faire son choix. Les 4 autres sont placés devant lui, visibles de tous.","8+","20 cartes","15 minutes","2");
    $jeuT2 = new Jeu_T(2,6,"Giraformetre","Lifestyle Boardgames Ltd","Chaque joueur ne dispose que de 8 des 12 symboles pour faire son choix. Les 4 autres sont placés devant lui, visibles de tous.","8+","20 cartes","15 minutes","2");
    $jeuT1 = new Jeu_T(2,6,"Contrast","Pink Monkey Games","Chaque joueur ne dispose que de 8 des 12 symboles pour faire son choix. Les 4 autres sont placés devant lui, visibles de tous.","8+","20 cartes","15 minutes","2");
    
    ?>
    </body>


</html>
