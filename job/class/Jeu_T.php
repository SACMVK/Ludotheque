<?php
class Jeu_T{
	// AhMaD: les attributs pour Jeu_T
	private $idPC;
	private $dureeVie;
	private $nbJoueursMin;
	private $nbJoueursMax;
	private $editeur;
	private $illustrateur;
	private $difficulte;
	private $regles;
	private $nom;
	private $public;
	private $listePieces;
	
	// AhMaD: Le première connecteur
	function __construct($nbJoueursMin, $editeur,$nbJoueursMax,$illustrateur, $difficulte, $regles, $nom, $public, $listePieces, $dureeVie,$idPC=-1) {
		$this->idPC = $idPC;
		$this->dureeVie = $dureeVie;
		$this->nbJoueursMin = $nbJoueursMin;
		$this->editeur = $editeur;
		$this->illustrateur = $illustrateur;
		$this->nbJoueursMax = $nbJoueursMax;
		$this->difficulte = $difficulte;
		$this->regles = $regles;
		$this->nom = $nom;
		$this->public = $public;
		$this->listePieces = $listePieces;
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
	
	// illustrateur
	function getIllustrateur() {
		return $this->pseudo;
	}
	function setIllustrateur($illustrateur) {
		return $this->illustrateur = $illustrateur;
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
	
	// $dureeVie
	function getDureeVie() {
		return $this->dureeVie;
	}
	function setDureeVie($dureeVie) {
		return $this->dureeVie;
	}
	
	// AhMaD: ToString pour afficher l'objet, le point pour concaténer, cela comme (+) en java
	function __toString() {
		return ("id= " . $this->idPC . ", N° des joueurs minimum :" . $this->nbJoueursMin . ", Editeur : " .
				$this->editeur . ", Illustrateur: " . $this->illustrateur . ", N° des joueurs maximum: " . 
				$this->nbJoueursMax . ", Difficulte : " . $this->difficulte . ", Regles: " . $this->regles . 
				", Nom: " . $this->nom . ", Public" . $this->public . ", Liste des pieces: " . $this->listePieces .
				", Duree de Vie: " . $this->dureeVie);
	}
}
?>
