<?php
/* on vérifie que l'information "menu_destination" existe ET qu'elle n'est pas vide : */
if ( isset($_POST['menu_destination']) && !empty($_POST['menu_destination']) ) 

/* si c'est bien le cas (existe ET non-vide à la fois), on redirige le visiteur vers sa valeur choisie de l'information "menu_direction" : */
     {header("Location: ".$_POST['menu_destination']."");}

/* sinon, on le redirige vers une autre page utile : */
else 
     {header("Location: http://www.monsite.net/plan.html");}
?>