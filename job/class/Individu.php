
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
	
    // id
	public function  getIdUser() {
		return $this->idUser;
	}
	public function setIdUser($idUser) {
		return $this->idUser = $idUser;
	}
	
	// email
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		return $this->email = $email;
	}
	
	// telephone
	public function getTelephone() {
		return $this->telephone;
	}
	public function setTelephone($telephone) {
		return $this->telephone = $telephone;
	}
	
	// pseudo
	public function getPseudo() {
		return $this->pseudo;
	}
	public function setPseudo($Pseudo) {
		return $this->pseudo = $Pseudo;
	}
	
	// dateinscription
	public function getDateInscription() {
		return $this->dateInscription;
	}
	public function setDateInscription($dateInscription) {
		return $this->dateInscription = $dateInscription;
	}
	
	// Mdp
	public function getMdp() {
		return $this->mdp;
	}
	public function setMdp($mdp) {
		return $this->mdp = $mdp;
	}
	// droit
	public function getDroit() {
		return $this->droit;
	}
	public function setDroit($droit) {
		$this->droit = $droit;
	}
	
	// nom
	public function getNom() {
		return $this->nom;
	}
	public function setNom($nom) {
		return $this->nom = $nom;
	}
	
	// prenom
	public function getPrenom() {
		return $this->prenom;
	}
	public function setPrenom($prenom) {
		return $this->prenom = $prenom;
	}
	
	// date naissance
	public function getDateNaissance() {
		return $this->dateNaissance;
	}
	public function setDateNaissance($dateNaissance) {
		return $this->dateNaissance = $dateNaissance;
	}
	
        
	// ville
        public function getVille() {
		return $this->ville;
	}
	 public function setVille($ville) {
		return $this->ville=$ville;
	}
        
        
         // rue
        public function getRue() {
		return $this->rue;
	}
	 public function setRue($rue) {
		return $this->rue=$rue;
	}
        
          // codePostal
        public function getCodePostal() {
		return $this->codePostal;
	}
	 public function setCodePostal($codePostal) {
		return $this->codePostal=$codePostal;
	}
	
            // departement
        public function getDept() {
		return $this->dpt;
	}
	public function setDept($dpt) {
		return $this->dpt=$dpt;
	}
	
        
        // address
	public function getAddress() {
		return $this->address = array (
				"$this->ville",
				"$this->rue",
				"$this->codePostal",
				"$this->dpt" 
		);
	}
	public function setAddress($address) {
		return $this->$address = array (
			"$this->ville",
				"$this->rue",
				"$this->codePostal",
				"$this->dpt" 
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
