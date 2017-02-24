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
// AhMaD: j'ai fait ici   le test des classes pour savoir si ca marche
$jeu = new Individu ( 1, "Vannes", "Victor Hugo", 56000, "Morbhien", "ahmad@gmail.fr", "090I27483", "ahmad", "2017", "1234", "Admin", "Ahmad", "Ali", "1987" );
echo "<p>$jeu</p>";
?>

<?php require_once ('ihm/footer/footer.php');?>
</body>


</html>