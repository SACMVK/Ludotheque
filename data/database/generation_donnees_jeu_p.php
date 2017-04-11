<?php

function  supprimer_donnees_jeu_p(){
    $pdo = openConnexion();
    $requeteDelete = "DELETE * FROM jeu_p";
    $stmt = $pdo->prepare($requeteDelete);
    $stmt->execute();
    closeConnexion($pdo);
}

function generer_donnees_jeu_p(int $nombreJeuxP, int $nombreJeuxT , int $nombreIndividus){
    for ($indice = 0; $indice<$nombreJeuxP; $indice++)
    {
        $listEtats = getEtats();
        
        $list["idPC"] = rand(1, $nombreJeuxT);
        $list["idProprietaire"] = rand(1, $nombreIndividus);
        $list["etat"] = $listEtats[rand(0, count($listEtats)-1)];
        
        echo "idPC : ".$list["idPC"]."<br>idProprietaire : ".$list["idProprietaire"]."<br>etat".$list["etat"]."<br><br>";
        
        //insert($list);
    }
}

function getEtats(){
    	$pdo = openConnexion();
	$requete = "SELECT * FROM etat_d;";
	$stmt = $pdo->prepare($requete);
	$stmt->execute() ;
	$listEtats = null;
	while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$listEtats [] = $ligne['etat'];
	}
	closeConnexion($pdo);
	return $listEtats;
}