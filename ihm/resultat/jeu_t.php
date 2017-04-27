<?php
Function selectFromWhere($select,$table,$where){
    /* M : Ouverture de la connexion
     * $select: ce que l'on veut récuperer (1 valeur par exemple l'idPC
     * $table : dans quelle table?
     * $where : toute le weher (ex : "WHERE idPC = 10") -> peremet de ne pas mettre de clause where si l'on ne veut pas
     * ceci permet de récuperer une valeur d'une table
	 */
	$pdo = openConnexion();

	
	/* M : préparation de la requete - permet d'adapter les requetes en fonctions de variables
	 */
	$requeteSFW = "SELECT ".$select." FROM ".$table." ".$where.";";
        
	$stmtSFW = $pdo->prepare($requeteSFW);
	
	/* M : 
	 */
	$stmtSFW->execute();
        /* M : Fermeture de la connexion
	 */
	closeConnexion($pdo);    
}

// M : Affichage d'un jeu_t
?>
 <?php
    foreach ($Elements as $jeu_t) :
        if (!empty($Elements)):
    ?> 
<div><h1><?=  $jeu->getNom() ?></h1></div>      <div><img src="" /></div>

</br>
</br>
    <h2>Editeur : </h2>
        <p><?= $jeu->getEditeur() ?></p>
        </br>  
    <h2>Année de sortie : </h2>
        <p><?= $jeu->getAnneeSortie() ?></p>
        </br>  
    <h2>Nombre de joueurs : </h2>
        <p>De <?= $jeu->getNbJoueursMin() ?> à <?= $jeu->getNbJoueursMax() ?> joueurs</p>
        </br>
<h2>Genre : </h2>
        <p><?= selectFromWhere("genre","jeu_a_pour_genre","WHERE idPC = ".$jeu->getIdPC()) ?></p>
        </br>
<?php
  endif;
endforeach;
?>