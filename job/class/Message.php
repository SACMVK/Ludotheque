<?php

class Message {

    // charlotte

    private $idMessage = -1;
    private $idExped = -1;
    private $idDest = -1;
    private $typeMessage = "";
    private $sujet = "";
    private $texte= "";

    //charlotte :constructeur 

    function __construct( $idExped, $idDest, $typeMessage, $sujet, $texte,$idMessage = -1 ) {
        $this->idMessage = $idMessage;
        $this->idExped = $idExped;
        $this->idDest = $idDest;
        $this->typeMessage = $typeMessage;
        $this->sujet = $sujet;
        $this->texte = $texte;
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


    function getTypeMessage() {
        return $this->typeMessage;
    }

    function setTypeMessage($typeMessage) {
        return $this->typeMessage = $typeMessage;
    }

    // sujet


    function getSujet() {
        return $this->sujet;
    }

    function setSujet($sujet) {
        return $this->sujet = $sujet;
    }

    // texte

    function getTexte() {
        return $this->texte;
    }

    function setTexte($texte) {
        return $this->texte = $texte;
    }

    // charlotte: ToString pour afficher 
    function __toString() {
        return ( "idMessage= " . $this->idMessage . ", idExpediteur :" . $this->idExped . ", idDestinataire: " . $this->idDest . ", typeMessage: " . $this->typeMessage . "sujet : " . $this->sujet . "texte : " . $this->texte);
    }

}
