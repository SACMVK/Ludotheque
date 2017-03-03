<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta charset="UTF-8" />
    <link rel="stylesheet" href="ihm/css/bootstrap.min.css">
    <link rel="stylesheet" href="ihm/css/MUSA_carousel-extended.css">
    <link rel="stylesheet" href="ihm/css/Navigation-with-Button1.css">
    <link rel="stylesheet" href="ihm/css/informations.css">

   
    
<title>Ludotheque BTS</title>

<?php require ('./ihm/pages/effets.php'); ?>
</head>




<body>


<?php
include ('ihm/header/header.php');












/* charlotte : empty ne fonctionne pas car il vérifie si $_GET['page']=null, hors $_GET['page'] n'existe pas
 * in_array ne fonctionne pas non plus, pour une raison indéterminée
 * isset (is set) vérifie non =null mais vérifie si la variable existe ou pas avec une valeur
 */ 

if (!(isset($_GET['page']))){
    include('ihm/pages/accueil.php');
}
else {
    
    include'ihm/pages/informations.php'.$_GET['page'];
}
?>
  

    <script src="../ihm/js/boostrap.js"></script>
    <script src="../ihm/js/jquery-3.1.1.min.js"></script>
     <script src="ihm/js/jquery.min.js"></script>
    <script src="ihm/js/bootstrap.min.js"></script>
    <script src="ihm/js/MUSA_carousel-extended.js"></script>

    </body>


</html>
