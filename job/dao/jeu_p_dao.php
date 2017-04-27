<?php
// AhMaD: include connexion anec BD
require 'connexion_dao.php';

// AhMaD: les variables static
    const  TABLE_JEU_P = "jeu_p";
    const CLE_PRIMAIRE_JEU_P = "idJeuP";
     const TABLEJEUT = "jeu_t";
   const  TABLE_COMPTE = "compte";


  //AhMaD: functioin qui sert a integrer un valeur dans le table
   
    function  insert($listOfValues) {
    
        //AhMaD: déclaration les values
          $idUser = $list_Values['idUser'];
          $idJeuT = $list_Values['idJeuT'];
          $idJeuP =$list_Values['idJeuP'];
          $etat = $list_Values['etat'];
         
        
        //AhMaD:ouvrire la connexion avec BD
        $db = openConnexion();
       
       
        
        //AhMaD:la requete pour inserter dans le tableau jeu_p
        $requete_jeu_p= "INSERT INTO ".TABLE_JEU_P. " (idJeuP, idJeuT, idUser, etat) VALUES ( ".'$idJeuP'.",".'$idJeuT'.",".'$idUser'.",".'$etat'.");";
	
      //AhMaD: préparer la requête pour ensuite l'exécuter
        $stmt_jeu_p = $db->prepare($requete_jeu_p);
        $stmt_jeu_p->execute();
        
        
      //AhMaD: on cherche le plus grand ID du table
          $idJeuPMax = getMaxId('idJeuP',TABLE_JEU_P );
        
        //AhMaD:on créer un nouveau objet 
        return new Jeu_P($idJeuPMax,$idJeuT,$idUser,$etat);
        
        //AhMaD:fermateur  la connexion avec BD
      	 closeConnexion($db);
        
	
    }


//AMaD:function select en gros il s'agit de FIND!
    function select($requete){
  
        
        //AhMaD:ouvrire la connexion avec BD
        $db = openConnexion();
      
        //AhMaD:prepration de requete qiu vas trouver l'utilisateur entre deux table pour cela il y a jointeur
        $requete="SELECT * FROM ".TABLE_JEU_P.";";
        
        //AhMaD: préparer la requête pour ensuite l'exécuter
        $stmt= $db->prepare($requete);
       
        $stmt->execute() ;
        //AhMaD: on vas creer un array pour stocker les informations
          $Jeu_P_list= array();
        
        //AhMaD: je parcoure les tables pour afficher les resultats de ma requete.
               // mysql_fetch_assoc($result): permet de afficher les informations de toutes les champs
           while($champ = mysql_fetch_assoc($stmt)){
              //AhMaD:tant qu'il y a des informations dans chaque champ de la ligne je les prend el je les affiche 
            $idUser = $champ['idUser'];
            $idJeuT = $champ['idJeuT'];
            $idJeuP =$champ['idJeuP'];
            $etat = $champ['etat'];
              
        //AhMaD : on vas creer un nouveau objet avec les informations
            $jeu_p = new Jeu_P($idJeuP,$idJeuT,$idUser,$etat);
            
        //AhMaD : on stocke ce objet dans l'array pour remplir l'array 
          $Jeu_P_list[]=$jeu_p;
               
           }
    //AhMaD: on ferme la conexion
     closeConnexion($db);           
     
     //AhMaD: finalement on vas retourner avec un tableaux qui remplit des objets :)
     return $Jeu_P_list;
    }
    
    
    
    //AhMaD: function updat pour modifer le table
    function alter($listOfValues) {        
        
        //AhMaD: déclaration les values
           $idUser = $list_Values['idUser'];
          $idJeuT = $list_Values['idJeuT'];
          $idJeuP =$list_Values['idJeuP'];
          $etat = $list_Values['etat'];
        
          //AhMaD:ouvrire la connexion avec BD  
        $db = openConnexion();
              
        
        
            
            
            
             //AhMaD:on vas faire une requete pour savoir alter le table compte.  
            $user_requete= "UPDATE ".TABLE_COMPTE." SET idUser = ".'$idUser'."WHERE ".TABLE_COMPTE.". idUser = ".TABLE_JEU_P.". idUser ";";
            $stmt = $pdo->prepare($user_requete);
            $stmt->execute();
            $user=$stmt->execute();
            
              //AhMaD:on vas faire une requete pour savoir alter le table jeu_t.  
            $jeu_requete= "UPDATE ".TABLEJEUT." SET idJeuT = ".'$idJeuT'." WHERE ".TABLEJEUT.". idJeuT = ".TABLE_JEU_P.". idJeuT ";";
            $stmt = $db->prepare($jeu_requete);
            $stmt->execute();
            $jeu=$stmt->execute();
            
          //AhMaD:prepration de requete qui vas modifier l'utilisateur entre deux table pour cela il y a jointeur
        $requete="UPDATE ".TABLE_JEU_P." SET idJeuP=".'$idJeuP'.",idUser =".'$user'.",idJeuT=."'$jeu'.", etat=".'$etat'.";";
      
          
 
        
         //AhMaD: on vas préparer la requête et l'exécuter et tu vas bien.
        $stmt= $db->prepare($requete);
        
        
        //AhMaD: on vas exécuter
        $stmt->execute();
        
     
        
       //AhMaD: on ferme la conexion
     closeConnexion($db);        
    }
     //AhMaD: function supprimer pour supprimer un copte
    function delete($idOfLineToDelete) {
        
        
        //AhMaD:ouvrire la connexion avec BD  
        $db = openConnexion();
        
          //AhMaD:prepration de requete qui vas supprimer l'utilisateur entre deux table pour cela il y a jointeur
        $requete="DELETE FROM ".TABLE_JEU_P." WHERE idJeuP = ".'$idOfLineToDelete'." ;";
      
     //AhMaD: on vas préparer la requête et l'exécuter et tu vas bien.
        $stmt= $db->prepare($requete);
        
        
        //AhMaD: on vas exécuter
        $stmt->execute();
        
        //AhMaD:un petit test pour savoir si tu vas bien
        if($stmt==true){
            echo"la jeux était supprimé avec succès";
        }else{
            die("Il y a des erreures, veuillez modifier votre choix");
        }
        
       //AhMaD: on ferme la conexion
     closeConnexion($db);        
    }
