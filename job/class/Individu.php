
<?php
class Individu {
	// AhMaD: les attributs pour individu ca-a-dire un utilisateur et peut etre une groupe
	private $idUser;
	private $address = array ();
	private $email;
	private $telephone;
	private $pseudo;
	private $dateInscription;
	private $mdp;
	private $droit;
	private $nom;
	private $prenom;
	private $dateNaissance;
	// AhMaD: Le première connecteur
	function __construct_1($idUser, $ville, $rue, $codePostal, $dpt, $email, $telephone, $pseudo, $dateInscription, $mdp, $droit, $nom, $prenom, $dateNaissance) {
		$this->$idUser = $idUser;
		$address = array ();
		$this->$address ['ville'] = $ville;
		$this->$address ['rue'] = $rue;
		$this->$address ['codePostal '] = $codePostal;
		$this->$address ['dpt'] = $dpt;
		$this->$email = $email;
		$this->$telephone = $telephone;
		$this->$pseudo = $pseudo;
		$this->$dateInscription = $dateInscription;
		$this->$mdp = $mdp;
		$this->$droit = $droit;
		$this->$nom = $nom;
		$this->$prenom = $prenom;
		$this->$dateNaissance = $dateNaissance;
	}
	// AhMaD: Le deuxième connecteur ici idUser = -1 cela pour connecter avec BD, parce que l'id est auto
	function __construct_2($ville, $rue, $codePostal, $dpt, $email, $telephone, $pseudo, $dateInscription, $mdp, $droit, $nom, $prenom, $dateNaissance) {
		$this->$idUser = - 1;
		$address = array ();
		$this->$address ['ville'] = $ville;
		$this->$address ['rue'] = $rue;
		$this->$address ['codePostal '] = $codePostal;
		$this->$address ['dpt'] = $dpt;
		$this->$email = $email;
		$this->$telephone = $telephone;
		$this->$pseudo = $pseudo;
		$this->$dateInscription = $dateInscription;
		$this->$mdp = $mdp;
		$this->$droit = $droit;
		$this->$nom = $nom;
		$this->$prenom = $prenom;
		$this->$dateNaissance = $dateNaissance;
	}
	
	// AhMaD: getter et setter, on vas les utiliser pour chercher les informations ou les modifier
	// iduser
	
	
	// email
	function getEmail() {
		return $this->email;
	}
	function setEmail($email) {
		return $this->email = $email;
	}
	
	// telephone
	function getTelephone() {
		return $this->telephone;
	}
	function setTelephone($telephone) {
		return $this->telephone = $telephone;
	}
	
	// pseudo
	function getPseudo() {
		return $this->pseudo;
	}
	function setPseudo($Pseudo) {
		return $this->pseudo = $Pseudo;
	}
	
	// dateinscription
	function getDateInscription() {
		return $this->dateInscription;
	}
	function setDateInscription($dateInscription) {
		return $this->dateInscription = $dateInscription;
	}
	
	// Mdp
	function getMdp() {
		return $this->mdp;
	}
	function setMdp($mdp) {
		return $this->mdp = $mdp;
	}
	// droit
	function getDroit() {
		return $this->droit;
	}
	function setDroit($droit) {
		$this->droit = $droit;
	}
	
	// nom
	function getNom() {
		return $this->nom;
	}
	function setNom($nom) {
		return $this->nom = $nom;
	}
	
	// prenom
	function getPrenom() {
		return $this->prenom;
	}
	function setPrenom($prenom) {
		return $this->prenom = $prenom;
	}
	
	// date naissance
	function getDateNaissance() {
		return $this->dateNaissance;
	}
	function setDateNaissance($dateNaissance) {
		return $this->dateNaissance = $dateNaissance;
	}
	
	// address
	function getAddress() {
		return $this->address = array (
				"ville" => "ville",
				"rue" => "rue",
				"codePostal" => "codePostal",
				"dpt" => "dpt" 
		);
	}
	function setAddress($address) {
		return $this->address = array (
				"ville" => "ville",
				"rue" => "rue",
				"codePostal" => "codePostal",
				"dpt" => "dpt" 
		);
	}
	
	// AhMaD: ToString pour afficher l'objet, le point pour concaténer, cela comme (+) en java
	function __toString() {
		return ( "id= " . $this->idUser . ", Email :" . $this->email . ", N° tel: " . $this->telephone . ", Pseudo: " . $this->pseudo 
				.", Date d'nscription: " . $this->dateInscription . ", Mot de passe : " . $this->mdp . ", Droit: " . $this->droit . ", Nom: " 
				. $this->nom . ", Prenom" . $this->prenom . ", Date de Naissance: " . $this->dateNaissance . ", Address complète: " . $this->address );
	}
}
?>
