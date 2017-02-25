
<?php 
class Individu {
	// AhMaD: les attributs pour individu ca-a-dire un utilisateur et peut etre une groupe
	private $idUser;
	private $address = array ();
        private $ville;
        private $rue;
        private $codePostal;
        private $dpt;
	private $email;
	private $telephone;
	private $pseudo;
	private $dateInscription;
	private $mdp;
	private $droit;
	private $nom;
	private $prenom;
	private $dateNaissance;
       
         
    // AhMaD: Le connecteur aves (id user =-1) cela pour eviter faire deuxime constructeur pour le BD.
        //comme ca si tu crée un nouveau objet avec id il vas prendre le prendre sinon l'id=-1 par defaut  
    function __construct($ville, $rue, $codePostal, $dpt, $email, $telephone, $pseudo, $dateInscription, $mdp, $droit, $nom, $prenom, $dateNaissance,$idUser=-1) {
               $this->idUser = $idUser;
                $this->ville = $ville;
                $this->rue = $rue;
                $this->codePostal = $codePostal;
                $this->dpt = $dpt;
		$this->email = $email;
		$this->telephone = $telephone;
		$this->pseudo = $pseudo;
		$this->dateInscription = $dateInscription;
		$this->mdp = $mdp;
		$this->droit = $droit;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->dateNaissance = $dateNaissance;
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
				'$this->$ville',
				'$this->$rue',
				'$this->$codePostal',
				'$this->$dpt' 
		);
	}
	function setAddress($address) {
		return $this->$address = array (
			'$this->$ville',
				'$this->$rue',
				'$this->$codePostal',
				'$this->$dpt' 
		);
	}
	
	// AhMaD: ToString pour afficher l'objet, le point pour concaténer, cela comme (+) en java
	function __toString() {
		return( "id= ".$this->idUser . ", Email :" . $this->email . ", N° tel: " . $this->telephone . ", Pseudo: " . $this->pseudo 
				.", Date d'nscription: " . $this->dateInscription . ", Mot de passe : " . $this->mdp . ", Droit: " . $this->droit . ", Nom: " 
				. $this->nom . ", Prenom" . $this->prenom . ", Date de Naissance: " . $this->dateNaissance . ", Address complète est :  ville:".$this->ville.
                               ", rue".$this->rue.", code postal".$this->codePostal.", departement:".$this->dpt);
	}
}


