<?php
class Jeu_T{
	// AhMaD: les attributs pour Jeu_T
        private $idJeuT;
	private $idPC;
	private $nbJoueursMin;
	private $nbJoueursMax;	
        private $nom;
	private $editeur;
	private $regles;
	private $difficulte;
	private $public;
	private $listePieces;
	private $dureePartie;	

	// M - Pour pouvoir faire de la surcharge et donc avoir accès à un second constructeur on définit la clé primaire nécessaire aux recherches par id à -1 par défaut
	function __construct($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$idPC,$dureePartie,$idJeuT=-1) {
                $this->idJeuT;
                $this->idPC = $idPC;
		
		$this->nbJoueursMin = $nbJoueursMin;
		$this->nbJoueursMax = $nbJoueursMax;
                $this->nom = $nom;
		$this->editeur = $editeur;
		$this->regles = $regles;
		$this->difficulte = $difficulte;
		$this->public = $public;
		$this->listePieces = $listePieces;
                $this->dureePartie = $dureePartie;
		
	}
	
	// AhMaD: getter et setter, on vas les utiliser pour chercher les informations ou les modifier
	// IdPC
	function getIdPC() {
		return $this->idPC;
	}
	function setIdPC($idPC) {
		return $this->idPC = $idPC;
	}
	
	// NbJoueursMin
	function getNbJoueursMin() {
		return $this->nbJoueursMin;
	}
	function setNbJoueursMin($nbJoueursMin) {
		return $this->nbJoueursMin = $nbJoueursMin;
	}
	
	// editeur
	function getEditeur() {
		return $this->editeur;
	}
	function setEditeur($editeur) {
		return $this->editeur = $editeur;
	}
	
	// $nbJoueursMax
	function getNbJoueursMax() {
		return $this->nbJoueursMax;
	}
	function setNbJoueursMax($nbJoueursMax) {
		return $this->$nbJoueursMax = $nbJoueursMax;
	}
	
	// difficulte
	function getDifficulte() {
		return $this->difficulte;
	}
	function setDifficulte($difficulte) {
		return $this->difficulte = $difficulte;
	}
	// droit
	function getRegles() {
		return $this->regles;
	}
	function setRegles($regles) {
		$this->regles = $regles;
	}
	
	// nom
	function getNom() {
		return $this->nom;
	}
	function setNom($nom) {
		return $this->nom = $nom;
	}
	
	// public
	function getpublic() {
		return $this->public;
	}
	function setPublic($public) {
		return $this->public = $public;
	}
	
	// listePieces
	function getListePiecese() {
		return $this->listePieces;
	}
	function setListePieces($listePieces) {
		return $this->listePieces = $listePieces;
	}
	
	// $dureePartie
	function getDureePartie() {
		return $this->dureePartie;
	}
	function setDureePartie($dureePartie) {
		return $this->dureePartie;
	}
	
	// AhMaD: ToString pour afficher l'objet, le point pour concaténer, cela comme (+) en java
	function __toString() {
		return ("id= " . $this->idPC . "\n Nombre de joueurs : de " . $this->nbJoueursMin . " à " . $this->nbJoueursMax ." joueurs.\n Nom du jeu : ".$this->nom.
                        "\n Editeur : ".$this->editeur."\n Regles : ".$this->regles."\n Difficulté : ".$this->difficulte."Public : ".$this->public." Liste des pièces : ".$this->listePieces.
                        "\n Durée de la partie : ".$this->dureePartie);
	}
}
?>
