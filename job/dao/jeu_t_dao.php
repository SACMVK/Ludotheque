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
	
	/* M : Ressort chaque entrées une à une
	 */
	while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
        {
            echo $donnees['nom'];
            
            /* M :création des variable en local qui récupèrent les données de la table pour chaque champs de l'objet
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

Function insert($valueToInsert){
	/* M : Ouverture de la connexion
	 */
	$pdo = openConnexion();
        
        // M :Vérification si l'editeur existe déjà dans le dico editeur_d, 1 ligne si oui, 0 sinon
        $edi = "SELECT * FROM editeur_d WHERE editeur=:editeur;";
        $query = $pdo->prepare($edi);
	$query->execute(array('editeur'=>$valueToInsert['editeur'])) ;
        $count = $query->rowCount();
              
        //M : Requetes sur les tables jeu_t et produit_c_t 
	$requetePCT= "INSERT INTO ".TABLEPCT. " (typePC,anneeSortie,description) VALUES (:typePC,:anneeSortie,:description);";
        $requeteJeuT= "INSERT INTO ".TABLEJEUT." (idPC,nbJoueursMin,nbJoueursMax,nom,editeur,regles,difficulte,public,listePieces,dureePartie) VALUES (:idPC,:nbJoueursMin,:nbJoueursMax,:nom,:editeur,:regles,:difficulte,:public,:listePieces,:dureePartie);";      
        
        // M : préparation des requêtes
        $stmtPCT = $pdo->prepare($requetePCT); 
        $stmtJeuT = $pdo->prepare($requeteJeuT);
        
        // M : Vérification si   l'editeur existe dans le dictionnaire, sinon, je l'ajoute à celui ci
        if ($count==0){
            $requeteEditeur_d= "INSERT INTO ".TABLE_EDITEUR_D."(editeur) VALUES (:editeur);";
            $stmtEditeur_d = $pdo->prepare($requeteEditeur_d);
            $stmtEditeur_d->execute(array(
                "editeur" => $valueToInsert['editeur']
            ));
        }        
        
        // M : On execute        
        $stmtPCT->execute(array(
            "typePC" => $valueToInsert['typePC'],
            "anneeSortie" => $valueToInsert['anneeSortie'],
            "description" => $valueToInsert['description']
        ));
        
        // M : Récupération du dernier ID avec lastInsertID() sur le pdo
        $lastIdPC = $pdo->lastInsertId();
        $stmtJeuT->execute(array(
            "idPC" => $lastIdPC,
            "nbJoueursMin" => $valueToInsert['nbJoueursMin'],
            "nbJoueursMax" => $valueToInsert['nbJoueursMax'],
            "nom" => $valueToInsert['nom'],
            "editeur" => $valueToInsert['editeur'],
            "regles" => $valueToInsert['regles'],
            "difficulte" => $valueToInsert['difficulte'],
            "public" => $valueToInsert['public'],
            "listePieces" => $valueToInsert['listePieces'],
            "dureePartie" => $valueToInsert['dureePartie']
        ));

	/* M : Fermeture de la connexion
	 */
	closeConnexion($pdo);
}

Function alter($valueToAlter){
	/* M : Ouverture de la connexion
	 */
	$pdo = openConnexion();
        
        // M :Vérification si l'editeur existe déjà dans le dico editeur_d, 1 ligne si oui, 0 sinon
        $edi = "SELECT * FROM editeur_d WHERE editeur=:editeur;";
        $query = $pdo->prepare($edi);
	$query->execute(array('editeur'=>$valueToAlter['editeur'])) ;
        $count = $query->rowCount();
        
         //M : Requetes sur les tables jeu_t et produit_c_t 
	$requeteUpdateJeuT= "UPDATE ".TABLEJEUT." SET nbJoueursMin=:nbJoueursMin,nbJoueursMax=:nbJoueursMax,nom=:nom,editeur=:editeur,regles=:regles,difficulte=:difficulte,public=:public,listePieces=:listePieces,dureePartie=:dureePartie WHERE idPC = :idPC;";
        $requeteUpdatePCT= "UPDATE ".TABLEPCT. " SET typePC=:typePC,anneeSortie=:anneeSortie,description=:description WHERE idPC = :idPC;";
        
        //préparation des requêtes
        $stmtJeuT = $pdo->prepare($requeteUpdateJeuT);
        $stmtPCT = $pdo->prepare($requeteUpdatePCT);       
        
        /* M : Vérification si l'editeur existe dans le dictionnaire :
         * si non, je l'ajoute à celui ci
        */
        if ($count==0){
            $requeteEditeur_d = "INSERT INTO ".TABLE_EDITEUR_D."(editeur) VALUES (:editeur);";
            $stmtEditeur_d = $pdo->prepare($requeteEditeur_d);
            $stmtEditeur_d->execute(array("editeur" => $valueToAlter['editeur']));
        }

        //On execute 
        $stmtJeuT->execute(array(
            "idPC" => $valueToAlter['idPC'],
            "nbJoueursMin" => $valueToAlter['nbJoueursMin'],
            "nbJoueursMax" => $valueToAlter['nbJoueursMax'],
            "nom" => $valueToAlter['nom'],
            "editeur" => $valueToAlter['editeur'],
            "regles" => $valueToAlter['regles'],
            "difficulte" => $valueToAlter['difficulte'],
            "public" => $valueToAlter['public'],
            "listePieces" => $valueToAlter['listePieces'],
            "dureePartie" => $valueToAlter['dureePartie']
        ));
        
        $stmtPCT->execute(array(
            "idPC" => $valueToAlter['idPC'],
            ":typePC" => $valueToAlter['typePC'],
            ":anneeSortie" => $valueToAlter['anneeSortie'],
            ":description" => $valueToAlter['description']
        ));
        
	/* M : Fermeture de la connexion
	 */
	closeConnexion($pdo);    
}

//suppresssion d'un jeu par son idPC
Function delete($idOfLineToDelete){
    /* M : Ouverture de la connexion
	 */
	$pdo = openConnexion();

	
	/* M : préparation de la requete - permet d'adapter les requetes en fonctions de variables
	 */
	$requeteDeleteJeuT = "DELETE FROM ".TABLEJEUT." WHERE idPC = :idPC;";
        $requeteDeletePCT = "DELETE FROM ".TABLEPCT." WHERE idPC = :idPC;";
        
	$stmtDeleteJeuT = $pdo->prepare($requeteDeleteJeuT);
        $stmtDeletePCT = $pdo->prepare($requeteDeletePCT);
	
        $stmtDeleteJeuT->bindParam(':idPC', $idOfLineToDelete);
        $stmtDeletePCT->bindParam(':idPC', $idOfLineToDelete);
	/* M : 
	 */
	$stmtDeleteJeuT->execute();
        $stmtDeletePCT->execute();
        /* M : Fermeture de la connexion
	 */
	closeConnexion($pdo);    
}