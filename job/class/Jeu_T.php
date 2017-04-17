<?php
class Jeu_T{
	// M: les attributs pour Jeu_T
        //private $idJeuT;
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
        private $anneeSortie;
        private $description;
        private $typePC;
        private $genre;

	/* M - Pour pouvoir faire de la surcharge et donc avoir accès à un second
         *  constructeur on définit la clé primaire nécessaire aux recherches par id à -1 par défaut
         */
	function __construct($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$dureePartie,$anneeSortie,$description,$typePC,$genre,$idPC=-1/*,$idJeuT=-1*/) {
                //$this->idJeuT = $idJeuT;
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
		$this->anneeSortie = $anneeSortie;
                $this->description = $description;
                $this->typePC = $typePC;
                $this->genre = $genre;
	}
	
	//M : Getters and Setters
	//M : IdPC
	public function getIdPC() {
		return $this->idPC;
	}
	public function setIdPC($idPC) {
		return $this->idPC = $idPC;
	}
	
	//M : NbJoueursMin
	public function getNbJoueursMin() {
		return $this->nbJoueursMin;
	}
	public function setNbJoueursMin($nbJoueursMin) {
		return $this->nbJoueursMin = $nbJoueursMin;
	}
	
	//M : editeur
	public function getEditeur() {
		return $this->editeur;
	}
	public function setEditeur($editeur) {
		return $this->editeur = $editeur;
	}
	
	//M : $nbJoueursMax
	public function getNbJoueursMax() {
		return $this->nbJoueursMax;
	}
	public function setNbJoueursMax($nbJoueursMax) {
		return $this->$nbJoueursMax = $nbJoueursMax;
	}
	
	//M : difficulte
	public function getDifficulte() {
		return $this->difficulte;
	}
	public function setDifficulte($difficulte) {
		return $this->difficulte = $difficulte;
	}
	//M : droit
	public function getRegles() {
		return $this->regles;
	}
	public function setRegles($regles) {
		$this->regles = $regles;
	}
	
	//M : nom
	public function getNom() {
		return $this->nom;
	}
	public function setNom($nom) {
		return $this->nom = $nom;
	}
	
	//M : public
	public function getpublic() {
		return $this->public;
	}
	public function setPublic($public) {
		return $this->public = $public;
	}
	
	//M : listePieces
	public function getListePiecese() {
		return $this->listePieces;
	}
	public function setListePieces($listePieces) {
		return $this->listePieces = $listePieces;
	}
	
	//M : $dureePartie
	public function getDureePartie() {
		return $this->dureePartie;
	}
	public function setDureePartie($dureePartie) {
		return $this->dureePartie;
	}
        
        /*M : AJOUT DES PARAMETRES DE LA TABLE produit_culturel_t */
        //M : $anneeSortie
	public function getAnneeSortie() {
		return $this->anneeSortie;
	}
	public function setAnneeSortie($anneeSortie) {
		return $this->anneeSortie;
	}
        
        //M : $description
	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		return $this->description;
	}
	
        //M : $typePC
	public function getTypePC() {
		return $this->typePC;
	}
	public function setTypePC($typePC) {
		return $this->typePC;
	}
        
        //M : $typePC
	public function getGenre() {
		return $this->genre;
	}
	public function setGenre($genre) {
		return $this->genre;
	}
        
	// AhMaD: ToString pour afficher l'objet, le point pour concaténer, cela comme (+) en java
	function __toString() {
		return ("<h2>".$this->nom."</h2><br/>id= " . $this->idPC . "<br/> Nombre de joueurs : de " . $this->nbJoueursMin . " à " . $this->nbJoueursMax ." joueurs.".
                        "<br/> Editeur : ".$this->editeur."<br/> Regles : ".$this->regles."<br/> Difficulté : ".$this->difficulte."<br/> Public : ".$this->public."<br/> Liste des pièces : ".$this->listePieces.
                        "<br/> Durée de la partie : ".$this->dureePartie);
	}
}
?>
