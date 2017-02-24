
<?php
class Jeu_P {
	// AhMaD: les attributs pour Jeu_T
	private $idJeuP;
	private $idJeuT;
	private $idProprietaire;
	private $etat;
	

// AhMaD: Le connecteur aves (id user =-1) cela pour eviter faire deuxime constructeur pour le BD.
        //comme ca si tu crée un nouveau objet avec id il vas prendre le prendre sinon l'id=-1 par defaut  
	function __construct( $idProprietaire, $etat,  $idJeuT,$idJeuP=-1) {
		$this->idJeuP = $idJeuP;
		$this->idJeuT = $idJeuT;
		$this->idProprietaire = $idProprietaire;
		$this->etat = $etat;
		
	}
	// AhMaD: getter et setter, on vas les utiliser pour chercher les informations ou les modifier
	// idJeuP
	function getIdJeuP() {
		return $this->idJeuP;
	}
	function setdJeuP($idJeuP) {
		return $this->idJeuP = $idJeuP;
	}

	// idProprietaire
	function getIdProprietaire() {
		return $this->IdProprietaire;
	}
	function setNbIdProprietaire($idProprietaire) {
		return $this->idProprietaire = $idProprietaire;
	}

	
	// etat
	function getEtat() {
		return $this->etat;
	}
	function setEtat($etat) {
		return $this->$etat = $etat;
	}



	// idJeuT
	function getIdJeuT() {
		return $this->idJeuT;
	}
	function setIdJeuT($idJeuT) {
		return $this->idJeuT;
	}

	// AhMaD: ToString pour afficher l'objet, le point pour concaténer, cela comme (+) en java
	function __toString() {
		return ("id= " . $this->idJeuP . ", id de Proprietaire :" . $this->idProprietaire . ", Etat: " . $this->etat  . 
			 ", id de jeuT: " . $this->idJeuT);
	}
}
?>
