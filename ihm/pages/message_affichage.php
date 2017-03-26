<?php

function afficherElement($message){
        // stefan : @Charlotte : afficher un message
}

function afficherListeElements($liste_message){
    // stefan : @Charlotte : afficher une liste de messages
}

function afficher_msg($list){
   
     $message = "<h1>Messages </h1><br> ";
    foreach ($list as $msg) {
        $message.=
                
   '<div class = "type_msg"><tr> Sujet :  '.$msg->getSujet().'</tr><br></div>
      
      <div class="text_msg"><tr> Message : '.$msg->getTexte().'</tr><br><tr> <br> </tr></div>
';
    }
       return $message;
    
}