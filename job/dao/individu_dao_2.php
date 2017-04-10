

<?php
// AhMaD: include connexion anec BD
require 'connexion_dao.php';

// AhMaD: les variables static
    const  TABLE1= "individu";
    const  TABLE2= "compte";
    const CLE_PRIMAIRE_1 = "idUser";
    const CLE_PRIMAIRE_2 = "nom";
  
  //AhMaD: functioin qui sert a integrer un valeur dans le table
    function  insert($ville, $rue, $codePostal, $dpt, $email, $telephone, $pseudo, $dateInscription, $mdp, $droit, $nom, $prenom, $dateNaissance) {
        //AhMaD:ouvrire la connexion avec BD
        $db = openConnexion();
       
         //AhMaD:deux requette car il y a deux tables (compte et individu)    
	$query1= "INSERT INTO ".TABLE1."(idUser,prenom,dateNaissance) VALUES (?,?,?);";
        $query2= "INSERT INTO ".TABLE2. " (ville,rue,codePostal,dpt,email,telephone,pseudo,dateInscription,mdp) VALUES (?,?,?,?,?,?,?,?,?');";
	$result1 =mysql_query($query1, $db);
        $result2 =mysql_query($query2, $db);
        
      ////AhMaD: on cherche le plus grand ID du table
        $idUser = $db->lastInsertId();
        
        //AhMaD:on créer un nouveau objet 
        return new Individu($ville, $rue, $codePostal, $dpt, $email, $telephone, $pseudo, $dateInscription, $mdp, $droit, $nom, $prenom, $dateNaissance,$idUser);
        
        //AhMaD:fermateur  la connexion avec BD
      	 closeConnexion($db);
        
	
    }
