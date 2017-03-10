<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	/* M : création des variables tables
	 */
	const TABLEJEUT = 'jeu_t';
        const TABLEPCT = 'produit_culturel_t';
        const TABLE_EDITEUR_D = 'editeur_d';

        include 'job/dao/Connexion_Dao.php';
Function select($requete){
	/* M : Ouverture de la connexion
	 */
	$pdo = openConnexion();

	
	/* M : préparation de la requete - permet d'adapter les requetes en fonctions de variables
	 */
	$requete = "SELECT * FROM ".TABLEJEUT." jt JOIN ".TABLEPCT." pct ON pct.idPC=jt.idPC;";
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
            //$idJeuT = $donnees['idJeuT'];
            $typePC = $donnees['typePC'];
            
            /* création du nouvel objet Jeu_T */
            $jeuT = new Jeu_T($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$dureePartie,$anneeSortie,$description,$typePC,$idPC/*,$idJeuT*/);
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

//$listeJeuT = new Jeu_T($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$dureePartie,$typePC,$anneeSortie,$description,$idPC,$idJeuT);

Function insert($listJeuT){
	/* M : Ouverture de la connexion
	 */
	$pdo = openConnexion();
        
        //lecture de la table editeur : retourne un liste d'editeurs correpsondant à la valeur indiqué par l'utilisateur
        $edi = "SELECT * FROM editeur_d WHERE editeur=".$listJeuT['editeur'].";";
        $stmt = $pdo->prepare($edi);
	$stmt->execute() ;
	$liste_editeur = array();
	while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC))
        {   $editeur = $donnees['editeur'];
            $liste_editeur []= $editeur;
	}
        return $liste_editeur;
        
        
         //M : Requetes sur les tables jeu_t et produit_c_t 
	$requetePCT= "INSERT INTO ".TABLEPCT. " (typePC,anneeSortie,description) VALUES (:typePC,:anneeSortie,:description);";
        $requeteJeuT= "INSERT INTO ".TABLEJEUT." (idPC,nbJoueursMin,nbJoueursMax,nom,editeur,regles,difficulte,public,listePieces,dureePartie) VALUES (:idPC,:nbJoueursMin,:nbJoueursMax,:nom,:editeur,:regles,:difficulte,:public,:listePieces,:dureePartie);";
        $requeteEditeur_d= "INSERT INTO".TABLE_EDITEUR_D."(editeur) VALUES (:editeur);";
        
        //préparation des requêtes
        $stmtPCT = $pdo->prepare($requetePCT); 
        $lastIdPC = mysql_insert_id();
        $stmtJeuT = $pdo->prepare($requeteJeuT);
        $stmtEditeur_d = $pdo->prepare($requeteEditeur_d);

        if (count($liste_editeur)== 0 ){
            $stmtEditeur_d->execute(array(
                "editeur" => $editeur
            ));
        }
        
        //On execute
        $stmtJeuT->execute(array(
            "idPC" => $lastIdPC,
            "nbJoueursMin" => $listJeuT['nbJoueursMin'],
            "nbJoueursMax" => $listJeuT['nbJoueursMax'],
            "nom" => $listJeuT['nom'],
            "editeur" => $listJeuT['editeur'],
            "regles" => $listJeuT['regles'],
            "difficulte" => $listJeuT['difficulte'],
            "public" => $listJeuT['public'],
            "listePieces" => $listJeuT['listePieces'],
            "dureePartie" => $listJeuT['dureePartie']
        ));
        
        $stmtPCT->execute(array(
            "typePC" => $listJeuT['typePC'],
            "anneeSortie" => $listJeuT['anneeSortie'],
            "description" => $listJeuT['description']
        ));
        
        
        /*//M : on sort l'ID plus grand
        $idJeuT = getMaxId('idUser',$tablePCT);*/
        
        //M : création d'un objet Jeu_T 
        //new Jeu_T($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$dureePartie,$anneeSortie,$description,$idPC,$idJeuT);

	/* M : Fermeture de la connexion
	 */
	closeConnexion($pdo);
}

Function update($listeJeuT){
	/* M : Ouverture de la connexion
	 */
	$pdo = openConnexion();
        
         //M : Requetes sur les tables jeu_t et produit_c_t 
	$requeteUpdateJeuT= "UPDATE ".TABLEJEUT." SET 'idPC'=:idPC,'nbJoueursMin'=:nbJoueursMin,'nbJoueursMax'=:nbJoueursMax,'nom'=:nom,'editeur'=:editeur,'regles'=:regles,'difficulte'=:difficulte,'public'=:public,'listePieces'=:listePieces,'dureePartie'=:dureePartie;";
        $requeteUpdatePCT= "UPDATE ".TABLEPCT. " SET 'typePC'=:typePC,'anneeSortie'=:anneeSortie,'description'=:description;";
        
        //préparation des requêtes
        $stmtJeuT = $pdo->prepare($requeteUpdateJeuT);
        $stmtPCT = $pdo->prepare($requeteUpdatePCT);        

        //On execute
        $stmtJeuT->execute(array(
            "idPC" => $listeJeuT['idPC'],
            "nbJoueursMin" => $listeJeuT['nbJoueursMin'],
            "nbJoueursMax" => $listeJeuT['nbJoueursMax'],
            "nom" => $listeJeuT['nom'],
            "editeur" => $listeJeuT['editeur'],
            "regles" => $listeJeuT['regles'],
            "difficulte" => $listeJeuT['difficulte'],
            "public" => $listeJeuT['public'],
            "listePieces" => $listeJeuT['listePieces'],
            "dureePartie" => $listeJeuT['dureePartie']
        ));
        
        $stmtPCT->execute(array(
            "typePC" => $listeJeuT['typePC'],
            "anneeSortie" => $listeJeuT['anneeSortie'],
            "description" => $listeJeuT['description']
        ));
        
        /*//M : on sort l'ID plus grand
        $idJeuT = getMaxId('idUser',$tablePCT);*/
        
        //M : création d'un objet Jeu_T 
        //new Jeu_T($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$dureePartie,$anneeSortie,$description,$idPC,$idJeuT);

	/* M : Fermeture de la connexion
	 */
	closeConnexion($pdo);    
}