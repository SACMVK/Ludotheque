<?php
function afficherListeElements($listOfElements) {
    //Ahmad: afficher une liste d'individus
    $afficher = "<p id='titre'>Les résultats de votre recherche : </p> ";
    $afficher .= ' <table id="table_recherche_individu" >';
    $afficher .= '<thead>';
    $afficher .= ' <tr>';
    $afficher .= '<th id="table_recherche_individu"> Votre choix </th> ';
    $afficher .= '<th id="table_recherche_individu"> ID  </th> ';
    $afficher .= '<th id="table_recherche_individu"> nom  </th>';
    $afficher .= ' <th id="table_recherche_individu"> prnom  </th>';
    $afficher .= '<th id="table_recherche_individu"> rue </th>';
    $afficher .= '<th id="table_recherche_individu"> ville  </th>';
    $afficher .= '<th id="table_recherche_individu"> code postale  </th>';
    $afficher .= '<th id="table_recherche_individu">  departement  </th>';
    $afficher .= '<th id="table_recherche_individu"> email  </th>';
    $afficher .= '<th id="table_recherche_individu"> tel  </th>';
    $afficher .= '<th id="table_recherche_individu"> date de nissance  </th>';
    $afficher .= '<th id="table_recherche_individu"> droit  </th>';
    $afficher .= '<th id="table_recherche_individu"> mot de passe </th>';
    $afficher .= ' <th id="table_recherche_individu"> date d\'inscrire </th>';
    $afficher .= '<th id="table_recherche_individu">nike name  </th>';
    $afficher .= '</tr>';
    $afficher .= '<thead>';
    $afficher .= '<tbody>';


    foreach ($listOfElements as $individu) {


        $afficher .= '<tr>';
        $afficher .= '<td> <input type="radio" name="select_individu"  </td>';
        $afficher .= "<td id='table_recherche_individu'>" . $individu->getIdUser() . " 
     <td id='table_recherche_individu'>" . $individu->getNom() . "</td>
           <td id='table_recherche_individu'>" . $individu->getPrenom() . "</td>
     <td id='table_recherche_individu'>" . $individu->getRue() . "</td>
           <td id='table_recherche_individu'>" . $individu->getVille() . "</td>
     <td id='table_recherche_individu'>" . $individu->getCodePostal() . "</td>
           <td id='table_recherche_individu'>" . $individu->getDept() . "</td>
     <td id='table_recherche_individu'>" . $individu->getEmail() . "</td>
           <td id='table_recherche_individu'>" . $individu->getTelephone() . "</td>
 <td id='table_recherche_individu'>" . $individu->getDateNaissance() . "</td>    
     <td id='table_recherche_individu'>" . $individu->getDroit() . "</td>
           <td id='table_recherche_individu'>" . $individu->getMdp() . "</td>
                <td id='table_recherche_individu'>" . $individu->getDateInscription() . "</td>
                     <td id='table_recherche_individu'>" . $individu->getPseudo() . "</td>
     
   </tr>";
    }
    $afficher .= "</tbody>
</table>";
    $afficher .= '<div id="button-table"><br /><input id="submit" type="submit" name="submit" value="Modifier votre recherche" />      <button id="submit" type="submit" name="submit" value="Valider votre choix" >Valider votre choix</button>
  <br /><br /></div>';
    echo $afficher;
}
?>