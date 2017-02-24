<!DOCTYPE html>
<html>
<head>
<!-- require_once ('ihm/pages/feedback.php') -->
<title>Ludotheque BTS</title>

<?php require ('ihm/css/effets.php'); ?>
</head>


<body>
	
<?php require_once ('ihm/header/header.php');?>
<?php require_once ('ihm/menus/menuAdmin.php');?>
<?php require_once ('ihm/job/class/Indiviu.php');?>
<?php require_once ('ihm/job/class/Jeu_P.php');?>
<?php require_once ('ihm/job/class/Jeu_T.php');?>
<?php
// test les classes
$jeu = new Individu ( 1, "Vannes", "Victor Hugo", 56000, "Morbhien", "ahmad@gmail.fr", "090I27483", "ahmad", "2017", "1234", "Admin", "Ahmad", "Ali", "1987" );
echo "<p>$jeu</p>";
?>

<?php require_once ('ihm/footer/footer.php');?>
</body>


</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

