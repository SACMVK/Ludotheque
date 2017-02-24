<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php echo utf8_encode('<title>Ludothèque</title>');?>
<link rel="stylesheet" type="text/css" href="ihm/css/config.css">
<link rel="stylesheet" type="text/css" href="ihm/css/connexion.css">
<link rel="stylesheet" type="text/css" href="ihm/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="ihm/css/style.css">
<script src="ihm/js/jquery-3.1.1.min.js"></script>
<script src="ihm/js/bootstrap.min.js"></script>


<?php 
// stefan : liste des fichiers à inclure
include 'job/dao/connexion_dao.php';
include 'job/dao/config_dao.php';
include 'job/dao/droits_dao.php';

/* stefan : récupération de la configuration enregistrée
 * ainsi que de la liste des droits dans la base de données.
 */
$config = loadConfig();
$liste_droits = loadDroits();


?>

</head>


<body>

<header></header>


<div><?php include 'job/dao/rep_dao.php';?></div>


<div><?php include 'ihm/pages/connexion.php';?></div>
<div><?php include 'ihm/pages/config.php';?></div>

<footer></footer>



</body>
</html>

