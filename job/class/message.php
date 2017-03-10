<?php

class Message {

    // Charlotte

    private $idMessage = -1;
    private $idExped = -1;
    private $idDest = -1;
    private $typeMessage = "";
    private $sujet = "";
    private $texte = "";

    //charlotte :constructeur 
    //M : Nous avons modifé la table message dans la base, et retiré typeMessage !!! A VERIFIER AVEC CHARLOTTE

    function __construct($idExped, $idDest, $typeMessage, $sujet, $texte, $idMessage = -1) {
        $this->idMessage = $idMessage;
        $this->idExped = $idExped;
        $this->idDest = $idDest;
        $this->typeMessage = $typeMessage;
        $this->sujet = $sujet;
        $this->texte = $texte;
    }

    // charlotte : getters et setters
    // idmessage
    public function getIdMessage() {
        return $this->idMessage;
    }

    public function setIdMessage($idMessage) {
        return $this->idMessage = $idMessage;
    }

    // id expéditeur
    public function getIdExped() {
        return $this->idExped;
    }

    public function setIdExped($idExped) {
        return $this->idExped = $idExped;
    }

    // id destinataire
    public function getIdDest() {
        return $this->idDest;
    }

    public function setIdDest($idDest) {
        return $this->idDest = $idDest;
    }

    // type de Message


    public function getTypeMessage() {
        return $this->typeMessage;
    }

    public function setTypeMessage($typeMessage) {
        return $this->typeMessage = $typeMessage;
    }

    // sujet


    public function getSujet() {
        return $this->sujet;
    }

    public function setSujet($sujet) {
        return $this->sujet = $sujet;
    }

    // texte

    public function getTexte() {
        return $this->texte;
    }

    public function setTexte($texte) {

        return $this->texte = $texte;
    }

    // charlotte: ToString pour afficher 
    public function __toString() {
        return ( "idMessage= " . $this->idMessage . ", idExpediteur :" . $this->idExped . ", idDestinataire: " . $this->idDest . ", typeMessage: " . $this->typeMessage . "sujet : " . $this->sujet . "texte : " . $this->texte);
    }

}
