<?php
//AhMaD:  le tableau qui vas remplir avec les résultatés de recherche d'un individu

function afficher($liste){
   
       $afficher="<p id='titre'>Les résultats de votre recherche : </p> ";
    $afficher.=' <table id="table-recherche" >';
 $afficher.='<thead>';
  $afficher.=' <tr>';
     $afficher.='<th id="table-recherche"> Votre choix </th> ';
     $afficher.='<th id="table-recherche"> ID  </th> ';
       $afficher.='<th id="table-recherche"> nom  </th>';
      $afficher.=' <th id="table-recherche"> prnom  </th>';
       $afficher.='<th id="table-recherche"> rue </th>';
       $afficher.='<th id="table-recherche"> ville  </th>';
       $afficher.='<th id="table-recherche"> code postale  </th>';
       $afficher.='<th id="table-recherche">  departement  </th>';
       $afficher.='<th id="table-recherche"> email  </th>';
       $afficher.='<th id="table-recherche"> tel  </th>';
       $afficher.='<th id="table-recherche"> date de nissance  </th>';
       $afficher.='<th id="table-recherche"> droit  </th>';
        $afficher.='<th id="table-recherche"> mot de passe </th>';
       $afficher.=' <th id="table-recherche"> date d\'inscrire </th>';
       $afficher.='<th id="table-recherche">nike name  </th>';
     $afficher.='</tr>';
 $afficher.='<thead>';
 $afficher.='<tbody>';
  
 foreach ($liste as $value) {
     
      
   $afficher.='<tr>';
       $afficher.='<td> <input type="radio" name="id"  </td>'; 
     $afficher.="<td id='table-recherche'>". $value->getIdUser() ." 
     <td id='table-recherche'>".$value->getNom()."</td>
           <td id='table-recherche'>".$value->getPrenom() ."</td>
     <td id='table-recherche'>".$value->getRue() ."</td>
           <td id='table-recherche'>".$value->getVille()."</td>
     <td id='table-recherche'>".$value->getCodePostal() ."</td>
           <td id='table-recherche'>".$value->getDept()."</td>
     <td id='table-recherche'>".$value->getEmail() ."</td>
           <td id='table-recherche'>".$value->getTelephone()."</td>
 <td id='table-recherche'>".$value->getDateNaissance()."</td>    
     <td id='table-recherche'>".$value->getDroit()."</td>
           <td id='table-recherche'>".$value->getMdp()."</td>
                <td id='table-recherche'>".$value->getDateInscription()."</td>
                     <td id='table-recherche'>".$value->getPseudo()."</td>
     
   </tr>";
   }
 $afficher.="</tbody>
</table>";
 $afficher.='<div id="button-table"><br /><input id="submit" type="submit" name="submit" value="Modifier votre recherche" />      <button id="submit" type="submit" name="submit" value="Valider votre choix" >Valider votre choix</button>
  <br /><br /></div>';
echo $afficher;
}

