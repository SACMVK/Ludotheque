<?php


if ($_POST['connexion'] == "on") {
    // stefan : la demande arrive en post afin de masquer les informations
    // 
    // TODO requete SQL
    // Chargement factice d'une session
    $connexionValide = true;
    if ($connexionValide){
    $_SESSION["pseudo"] = $_POST["pseudo"];
    $_SESSION["mdp"] = $_POST["mdp"];
    $_SESSION["droits"] = $_POST["droits"];
    }
    
    if ($connexionValide) {
        $pageAAfficher = "ihm/pages/accueilConnected.php";
    } else {
        $pageAAfficher = "ihm/connexion/echecConnexion.php";
    }

}



