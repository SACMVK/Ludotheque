<?php

// AhMaD: include connexion anec BD
        include 'job/dao/Connexion_Dao.php';

// AhMaD: les variables static
const TABLE_INDIVIDU = "individu";
const TABLE_COMPTE = "compte";
const CLE_PRIMAIRE_INDIVIDU = "idUser";
const CLE_PRIMAIRE_COMPTE = "nom";

//AhMaD: functioin qui sert a integrer un valeur dans le table

function insert($list_Values) {

    //AhMaD: déclaration les values
    //$idUser = $list_Values['idUser'];
    $ville = $list_Values['ville'];
    $adresse = $list_Values['adresse'];
    $numDept = $list_Values['numDept'];
    $codePostal = $list_Values['codePostal'];
    $email = $list_Values['email'];
    $telephone = $list_Values['telephone'];
    $pseudo = $list_Values['pseudo'];
    $dateInscription = $list_Values['dateInscription'];
    $mdp = $list_Values['mdp'];
    $droit = $list_Values['droit'];
    $prenom = $list_Values['prenom'];
    $nom = $list_Values['nom'];
    $dateNaiss = $list_Values['dateNaiss'];

    //AhMaD:ouvrire la connexion avec BD
    $pdo = openConnexion();



    //AhMaD:la requete pour inserter dans le tableau compte
    $requete_compte = "INSERT INTO " . TABLE_COMPTE . " (adresse,ville,numDept,email,telephone,pseudo,dateInscription,mdp,codePostal,droit)
                                  VALUES ("$adresse","$ville,$numDept,$email,$telephone,$pseudo,$dateInscription,$mdp,$codePostal,$droit);";

    //AhMaD: préparer la requête pour ensuite l'exécuter
    $stmt_compte = $pdo->prepare($requete_compte);
    $stmt_compte->execute();



    //AhMaD: on recherche de la dernière id etait generaté par la precedent requete en utilisant la finction mysqli_insert_id();
    $id_Individu = mysqli_insert_id($stmt_compte);


    //AhMaD:la requete pour inserter dans le tableau individu
    $requete_individu = "INSERT INTO " . TABLE_INDIVIDU . "(nom,prenom,idUser,dateNaiss) VALUES ($nom,$prenom ,$id_Individu,$dateNaiss);";
    //AhMaD: préparer la requête pour ensuite l'exécuter
    $stmt_individu = $pdo->prepare($requete_individu);

    //AhMaD:exécuter
    $stmt_individu->execute();



    //AhMaD:fermateur  la connexion avec BD
    closeConnexion($pdo);

    //AhMaD:on créer un nouveau objet 
    return new Individu($id_Individu, $ville, $adresse, $codePostal, $numDept, $email, $telephone, $pseudo, $dateInscription, $mdp, $droit, $nom, $prenom, $dateNaiss);
}

//AMaD:function select en gros il s'agit de FIND!
function select($requete) {


    //AhMaD:ouvrire la connexion avec BD
    $pdo = openConnexion();

    //AhMaD:prepration de requete qiu vas trouver l'utilisateur entre deux table pour cela il y a jointeur
    $requete = "SELECT * FROM " . TABLE_INDIVIDU . "JOIN" . TABLE_COMPTE . " ON " . TABLE_INDIVIDU . ".idUser = " . TABLE_COMPTE . ".idUser ;";

    //AhMaD: préparer la requête pour ensuite l'exécuter
    $stmt = $pdo->prepare($requete);

    $stmt->execute();
    //AhMaD: on vas creer un array pour stocker les informations
    $individu = array();

    //AhMaD: je parcoure les tables pour afficher les resultats de ma requete.
    // mysql_fetch_assoc($result): permet de afficher les informations de toutes les champs
    while ($champ = mysql_fetch_assoc($stmt)) {
        //AhMaD:tant qu'il y a des informations dans chaque champ de la ligne je les prend el je les affiche 
        $idUser = $champ['idUser'];
        $ville = $champ['ville'];
        $adresse = $champ['adresse'];
        $codePostal = $champ['codePostal'];
        $numDept = $champ['numDept'];
        $email = $champ['email'];
        $telephone = $champ['telephone'];
        $pseudo = $champ['pseudo'];
        $dateInscription = $champ['dateInscription'];
        $mdp = $champ['mdp'];
        $droit = $champ['droit'];
        $nom = $champ['nom'];
        $prenom = $champ['prenom'];
        $dateNaiss = $champ['dateNaiss'];

        //AhMaD : on vas creer un nouveau objet avec les informations
        $compte = new Individu($idUser, $adresse, $ville, $numDept, $email, $telephone, $pseudo, $dateInscription, $mdp, $codePostal, $droit, $nom, $prenom, $dateNaiss);

        //AhMaD : on stocke ce objet dans l'array pour remplir l'array 
        $individu[] = $compte;
    }
    //AhMaD: on ferme la conexion
    closeConnexion($pdo);

    //AhMaD: finalement on vas retourner avec un tableaux qui remplit des objets :)
    return $individu;
}

//AhMaD: function updat pour modifer le table
function alter($list_Values) {

    //AhMaD: déclaration les values
    $idUser = $list_Values['idUser'];
    $ville = $list_Values['ville'];
    $adresse = $list_Values['adresse'];
    $numDept = $list_Values['numDept'];
    $codePostal = $list_Values['codePostal'];
    $email = $list_Values['email'];
    $telephone = $list_Values['telephone'];
    $pseudo = $list_Values['pseudo'];
    $dateInscription = $list_Values['dateInscription'];
    $mdp = $list_Values['mdp'];
    $droit = $list_Values['droit'];
    $prenom = $list_Values['prenom'];
    $nom = $list_Values['nom'];
    $dateNaiss = $list_Values['dateNaiss'];

    //AhMaD:ouvrire la connexion avec BD  
    $pdo = openConnexion();






    //AhMaD:on vas faire une requete pour savoir si le droit était changé.    ps :  NOT IN  ici  une oprétion logique comme (!=) ou (==) 
    $droit_requete = "UPDATE " . TABLE_COMPTE . " SET droit = $droit WHERE $droit NOT IN(SELECT droit FROM droit);";
    $stmt = $pdo->prepare($droit_requete);
    $stmt->execute();
    $le_droit = $stmt->execute();

    //AhMaD:prepration de requete qui vas modifier l'utilisateur entre deux table pour cela il y a jointeur
    $requete = "UPDATE " . TABLE_INDIVIDU . " JOIN " . TABLE_COMPTE . " ON " . TABLE_INDIVIDU . ".$idUser = " . TABLE_COMPTE . ".$idUser SET ville = $ville, adresse = $adresse, codePostal = $codePostal, 
           numDept = $numDept, email = $email, telephone = $telephone, pseudo = $pseudo, dateInscription = $dateInscription, mdp = $mdp, droit = \"$le_droit\", nom = $nom, prenom = $prenom, dateNaiss= $dateNaiss ;";




    //AhMaD: on vas préparer la requête et l'exécuter et tu vas bien.
    $stmt = $pdo->prepare($requete);


    //AhMaD: on vas exécuter
    $stmt->execute();



    //AhMaD: on ferme la conexion
    closeConnexion($pdo);
}

//AhMaD: function supprimer pour supprimer un copte
function delete($idOfLineToDelete) {


    //AhMaD:ouvrire la connexion avec BD  
    $pdo = openConnexion();

    //AhMaD:prepration de requete qui vas supprimer l'utilisateur entre deux table pour cela il y a jointeur
    $requete = "DELETE FROM " . TABLE_INDIVIDU . "JOIN" . TABLE_COMPTE . " ON " . TABLE_INDIVIDU . ".idUser = " . TABLE_COMPTE . ".idUser  WHERE" . CLE_PRIMAIRE_Compt . " = " . $idOfLineToDelete . " ;";

    //AhMaD: on vas préparer la requête et l'exécuter et tu vas bien.
    $stmt = $pdo->prepare($requete);


    //AhMaD: on vas exécuter
    $stmt->execute();

    //AhMaD:un petit test pour savoir si tout va bien
    if ($stmt == true) {
        echo"l'utilisateur était supprimé avec succès";
    } else {
        die("Il y a des erreurs, veuillez modifier votre choix");
    }

    //AhMaD: on ferme la conexion
    closeConnexion($pdo);
}
