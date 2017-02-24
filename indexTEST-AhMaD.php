<html>
<head>
<!-- require_once ('ihm/pages/feedback.php') -->
<title>Ludotheque BTS</title>

<?php require ('ihm/css/effets.php'); ?>
</head>


<body>
	
<?php require_once ('ihm/header/header.php');?>
<?php require_once ('ihm/menus/menuAdmin.php');?>
<?php require_once ('job/class/Individu.php');?>
    <?php require_once ('job/class/Jeu_P.php');?>
    <?php require_once ('job/class/Jeu_T.php');?>

<?php
// test les classes
$compte = new Jeu_P(9,'bon',5);
echo "<p> $compte</p>";
?>
<br />
<?php require_once ('ihm/footer/footer.php');?>
</body>


</html>