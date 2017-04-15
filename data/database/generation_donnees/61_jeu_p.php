<?php



function generer_donnees_jeu_p(int $nombreJeuxP, int $nombreJeuxT , int $nombreIndividus){
    for ($indice = 1; $indice<=$nombreJeuxP; $indice++)
    {
        $listEtats = getEtats();
        
        $list["idPC"] = rand(1, $nombreJeuxT);
        $list["idProprietaire"] = rand(1, $nombreIndividus);
        $list["etat"] = $listEtats[rand(0, count($listEtats)-1)];
        
        //echo "idPC : ".$list["idPC"]."<br>idProprietaire : ".$list["idProprietaire"]."<br>Etat du jeu : ".$list["etat"]."<br><br>";
        echo 'INSERT INTO jeu_p (idJeuP, idPC, idProprietaire, etat)';
        echo 'VALUES ("'.$indice.'", "'.$list["idPC"].'", "'.$list["idProprietaire"].'", "'.$list["etat"].'");';
echo '<br>';        
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