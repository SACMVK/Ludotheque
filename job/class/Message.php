<?php

class Message {
    // charlotte
    
    private $idMessage;
    private $idExped;
    private $idDest;
    private $typeMessage;
    private $sujet;
    private $texte;
    
    //charlotte :  premier constructeur qui servira plutôt à lire les messages
      
    function __construct_1($idMessage,$idExped,$idDest,$typeMessage,$sujet,$texte){
        $this->$idMessage = $idMessage;
        $this->$idExped = $idExped;
        $this->$idDest = $idDest;
        $this->$typeMessage = $typeMessage;
        $this->$sujet = $sujet;
        $this->$texte = $texte;
    }
    
    
    
    
    // charlotte : deuxieme constructeur qui serivra plutôt à écrire un nouveau message
    
    function __construct_2($idExped,$idDest,$typeMessage,$sujet,$texte) {
        $this->$idMessage = -1; // // on l'initialise à -1  car il pourra  creer aprés son "bon" idmessage aprés
        $this->$idExped = $idExped;
        $this->$idDest = $idDest;
        $this->$typeMessage = $typeMessage;
        $this->$sujet = $sujet;
        $this->$texte = $texte;
        ;
    }
 
    // charlotte : getters et setters
    
    
    // idmessage
	function getIdMessage() {
		return $this->idMessage;
	}
	function setIdMessage($idMessage) {
		return $this->idMessage = $idMessage;
	}
	
    
    
    // id expéditeur
	function getIdExped() {
		return $this->idExped;
	}
	function setIdExped($idExped) {
		return $this->idExped = $idExped;
	}
	
    
    
    // id destinataire
	function getIdDest() {
		return $this->idDest;
	}
	function setIdDest($idDest) {
		return $this->idDest = $idDest;
	}
	
    
    // type de Message
        
        
        function getTypeMessage(){
            return $this->typeMessage;
        }
    
        function setTypeMessage($typeMessage){
            return $this->typeMessage = $typeMessage;
        }
    
    
    // sujet
        
        
        function getSujet(){
            return $this->sujet;
        }
        
        function setSujet($sujet){
            return $this->sujet = $sujet;
     
        }
        
     // texte
        
        function getTexte(){
            return $this->texte;
        }
        
        function setTexte($texte){
            return $this->texte = $texte;
        }
        
        
        // charlotte: ToString pour afficher 
	function __toString() {
		return ( "idMessage= " . $this->idMessage . ", idExpediteur :" . $this->idExped . ", idDestinataire: " . $this->idDest . ", typeMessage: " . $this->typeMessage.
                        "sujet : " .$this->sujet."texte : ".$this->texte);
                                             
	}
        
        
        
        
        
}

