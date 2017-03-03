<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Function select($requete){
	include 'job/dao/Connexion_Dao.php';
	/* M : Ouverture de la connexion
	 */
	$pdo = openConnexion();

	
	/* M : création de la variable table
	 */
	$table = 'jeu_t';
        $tableJoin = 'produit_culturel_t';
	
	/* M : préparation de la requete - permet d'adapter les requetes en fonctions de variables
	 */
	$requete = "SELECT * FROM ".$table." jt JOIN ".$tableJoin." pct ON pct.idPC=jt.idPC;";
	$stmt = $pdo->prepare($requete);
	
	
	/* M : 
	 */
	$stmt->execute() ;

	
	/* M : Déclaration de la variable liste que l'on va retourner
	 */
	$liste_jeuT = array();
	
	/* Ressort chaque entrées une à une
	 */
	while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
        {
            echo $donnees['nom'];
            
            /*création des variable en local qui récupèrent les données de la table pour chaque champs de l'objet
             *  en fonction du constructeur défini dans Jeu_T
             */
            $nbJoueursMin = $donnees['nbJoueursMin'];
            $nbJoueursMax = $donnees['nbJoueursMax'];
            $nom = $donnees['nom'];
            $editeur = $donnees['editeur'];
            $regles = $donnees['regles'];
            $difficulte = $donnees['difficulte'];
            $public = $donnees['public'];
            $listePieces = $donnees['listePieces'];
            $dureePartie = $donnees['dureePartie'];
            $anneeSortie = $donnees['anneeSortie'];
            $description = $donnees['description'];
            $idPC = $donnees['idPC'];
            $idJeuT = $donnees['idJeuT'];
            
            /* création du nouvel objet Jeu_T */
            $jeuT = new Jeu_T($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$dureePartie,$anneeSortie,$description,$idPC,$idJeuT);
            // ajout de l'objet à la liste
            $liste_jeuT []= $jeuT;
	}
	
	
	/* M : Fermeture de la connexion
	 */
	closeConnexion($pdo);
	
	/* M : La valeur retournée est un array
	 */
	return $liste_jeuT;
       
}

Function insert($object){
    	include 'job/dao/connexion_dao_old.php';
	/* M : Ouverture de la connexion
	 */
	$pdo = openConnexion();

	/* M : Fermeture de la connexion
	 */
	closeConnexion($pdo);
}