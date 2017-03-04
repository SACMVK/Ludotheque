<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	/* M : création des variables tables
	 */
	$tableJeuT = 'jeu_t';
        $tablePCT = 'produit_culturel_t';

Function select($requete){
	include 'job/dao/Connexion_Dao.php';
	/* M : Ouverture de la connexion
	 */
	$pdo = openConnexion();

	
	/* M : préparation de la requete - permet d'adapter les requetes en fonctions de variables
	 */
	$requete = "SELECT * FROM ".$tableJeuT." jt JOIN ".$tablePCT." pct ON pct.idPC=jt.idPC;";
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

Function insert($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$dureePartie,$typePC,$anneeSortie,$description,$idPC,$idJeuT){
    	include 'job/dao/Connexion_Dao.php';
	/* M : Ouverture de la connexion
	 */
	$pdo = openConnexion();
        
         //M : Requetes sur les tables jeu_t et produit_c_t 
	$requeteJeuT= "INSERT INTO ".$tableJeuT." (idPC,nbJoueursMin,nbJoueursMax,nom,editeur,regles,difficulte,public,listePieces,dureePartie) VALUES (:idPC,:nbJoueursMin,:nbJoueursMax,:nom,:editeur,:regles,:difficulte,:public,:listePieces,:dureePartie);";
        $requetePCT= "INSERT INTO ".$tablePCT. " (typePC,anneeSortie,description) VALUES (:typePC,:anneeSortie,:description);";
        
        //préparation des requêtes
        $stmtJeuT = $pdo->prepare($requeteJeuT);
        $stmtPCT = $pdo->prepare($requetePCT);        

        //On execute
        $stmtJeuT->execute(array(
            "idPC" => $idPC = $idPC,
            "nbJoueursMin" => $nbJoueursMin = $nbJoueursMin,
            "nbJoueursMax" => $nbJoueursMax = $nbJoueursMax,
            "nom" => $nom = $nom,
            "editeur" => $editeur = $editeur,
            "regles" => $regles = $regles,
            "difficulte" => $difficulte = $difficulte,
            "public" => $public = $public,
            "listePieces" => $listePieces = $listePieces,
            "dureePartie" => $dureePartie = $dureePartie
        ));
        
        $stmtPCT->execute(array(
            "typePC" => $typePC = $typePC,
            "anneeSortie" => $anneeSortie = $anneeSortie,
            "description" => $description = $description
        ));
        
        /*//M : on sort l'ID plus grand
        $idJeuT = getMaxId('idUser',$tablePCT);*/
        
        //M : création d'un objet Jeu_T 
        //new Jeu_T($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$dureePartie,$anneeSortie,$description,$idPC,$idJeuT);

	/* M : Fermeture de la connexion
	 */
	closeConnexion($pdo);
}