<?php
// M : Fonction qui permet de n'afficher que les $length premiers caractères
function str_truncate($text, $length){
    if(strlen($text) <= $length) return $text;
    return trim(substr($text, 0, $length));
}

// M : Affihage de la liste des jeu_t
?>

<table border= 1px solid black>
    <caption><?=  $jeu->getNom() ?></caption>
    <tr>
        <th>Nombre de joueurs</th>
        <th>Editeur</th>
        <th>Règles</th>
        <th>Difficulté</th>
        <th>Public</th>
        <th>Liste des pièces</th>
        <th>Durée de la partie</th>
        <th>Année de sortie</th>
        <th>Description</th>
    </tr>
    <?php
    foreach ($listOfElements as $jeu_t) :
        if (!empty($listOfElements)):
    ?>        
    <tr>
        <td><?= $jeu->getNbJoueursMin() ?> à <?= $jeu->getNbJoueursMax() ?></td>
        <td><?= $jeu->getEditeur() ?></td>
        <td><?= str_truncate($jeu->getRegles(),100) ?> ...</td>
        <td><?= $jeu->getDifficulte() ?></td>
        <td><?= $jeu->getpublic() ?></td>
        <td><?= $jeu->getListePiecese() ?></td>
        <td><?= $jeu->getDureePartie() ?></td>
        <td><?= $jeu->getAnneeSortie() ?></td>
        <td><?= str_truncate($jeu->getDescription(),100) ?> ...</td>
    </tr>
    <?php    
        else:
    ?>
    <tr>
        <td>Aucun résultat</td>
    </tr>
    <?php
        endif;
    endforeach;
    ?>
</table>

