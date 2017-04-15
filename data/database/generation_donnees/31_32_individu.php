<?php



function generer_donnees_individu(int $nombreIndividus) {
    for ($indice = 1; $indice <= $nombreIndividus; $indice++) {

        $list['prenom'] = getPrenom();
        $list['nom'] = getNom();
        $list['email'] = getMail($list['prenom'], $list['nom']);
        $departement = getDepartement();
        $list['numDept'] = $departement[0];
        $list['codePostal'] = getCodePostal($departement[0]);
        $list['droit'] = getDroits();
        $list['dateNaiss'] = getDate_(1950, 2010);
        $list['dateInscription'] = getDate_(2016);
        $list['adresse'] = getAdresse();
        $list['ville'] = getVille();
        $list['telephone'] = getTelephone();
        $list['pseudo'] = getPseudo($list['prenom'], $list['nom']);
        $list['mdp'] = getMdp();

//        echo "<b>" . $list['prenom'] . " " . $list['nom'] . "</b><br>";
//        echo $list['email'] . "<br>";
//        echo $list['telephone'] . "<br>";
//        echo "Droits d'utilisateur : " . $list['droit'] . "<br>";
//        echo "Né(e) le : " . $list['dateNaiss'] . "<br>";
//        echo "Pseudo : " . $list['pseudo'] . "<br>";
//        echo "Mot de passe : " . $list['mdp'] . "<br>";
//        echo "Inscrit(e) le : " . $list['dateInscription'] . "<br>";
//        echo $list['adresse'] . " à " . $list['ville'] . ", " . $list['codePostal'] . " dans le " . $list['numDept'] . " (" . $departement[1] . ")<br><br>";
echo 'INSERT INTO compte (adresse,ville,email,telephone,pseudo,dateInscription,mdp,codePostal,numDept,droit)';
echo 'VALUES ("'.$list['adresse'].'","'.$list['ville'].'","'.$list['email'].'","'.$list['telephone'].'","'.$list['pseudo'].'","'.$list['dateInscription'].'","'.$list['mdp'].'","'.$list['codePostal'].'","'.$list['numDept'].'","'.$list['droit'].'");';
echo '<br>';
echo 'INSERT INTO individu (idUser,nom,prenom,dateNaiss)';
echo 'VALUES ('.$indice.',"'.$list['nom'].'","'.$list['prenom'].'","'.$list['dateNaiss'].'");';
echo '<br>';
        //insert($list);
    }
}

function getPseudo($prenom, $nom) {
    $prenom = wd_remove_accents(strtolower($prenom));
    $nom = wd_remove_accents(strtolower($nom));
    $listeMots = [
        " lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit", "mauris", "id", "nisi", "congue", "placerat", "leo", "eu", "ultrices", "erat", "phasellus", "convallis", "varius",
        "nunc", "at", "rhoncus", "nulla", "semper", "a", "curabitur", "eu", "consectetur", "velit", "sit", "amet", "consectetur", "ante", "nunc", "lorem", "arcu", "sagittis", "tristique", "odio",
        "ut", "ultricies", "porta", "eros", "aliquam", "ex", "felis", "placerat", "a", "tortor", "consequat", "imperdiet", "aliquam", "risus", "integer", "purus", "purus", "scelerisque", "quis", "leo",
        "nec", "bibendum", "molestie", "erat", "pellentesque", "vestibulum", "nisl", "ac", "massa", "consequat", "eget", "consectetur", "nunc", "hendrerit", "nullam", "lobortis", "lorem", "et", "tincidunt", "pulvinar",
        "metus", "turpis", "fermentum", "neque", "et", "facilisis", "diam", "orci", "vitae", "risus", "nam", "ac", "dui", "ullamcorper", "interdum", "nisi", "sit", "amet", "luctus", "lectus",
        "diam", "vitae", "eleifend", "dui", "elementum", "eu", "suspendisse", "ac", "enim", "at", "justo", "lacinia", "pretium", "praesent", "at", "sem", "quis", "nibh", "fermentum", "imperdiet"];
    $choix = rand(0, 5);
    switch ($choix) {
        case 0:
            $pseudo = $prenom . $nom;
            break;
        case 1:
            $pseudo = $nom . $prenom;
            break;
        case 2:
            $pseudo = $prenom . rand(10, 1000);
            break;
        case 3:
            $pseudo = $nom . rand(10, 1000);
            break;
        case 4:
            $pseudo = $listeMots[rand(0, count($listeMots) - 1)];
            break;
        case 5:
            $pseudo = $listeMots[rand(0, count($listeMots) - 1)] . rand(10, 1000);
            break;
    }
    return $pseudo;
}

function getMdp() {
    $mDP = "";
    $alphaNum = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
    $longueurMDP = rand(4, 8);
    for ($i = 0; $i < $longueurMDP; $i++) {
        $mDP .= $alphaNum[rand(0, count($alphaNum) - 1)];
    }
    return $mDP;
}

function getTelephone() {
    return "0" . rand(600000000, 799999999);
}

function getCodePostal($departement) {
    return $departement . rand(0, 9) . "00";
}

function getDroits() {
    $pdo = openConnexion();
    $requete = "SELECT * FROM droit_d;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $liste_droits = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $liste_droits [] = $ligne['droit'];
    }
    closeConnexion($pdo);
    return $liste_droits[rand(0, count($liste_droits) - 1)];
}

// stefan : nom pourri car on ne peut utiliser getDate()
function getDate_(int $dateMini, int $dateMax = 0) {
    // stefan : on ne peut mettre getDate()['year'] directement à la déclaration
    if ($dateMax == 0) {
        $dateMax = getDate()['year'];
    }
    $annee = rand($dateMini, $dateMax);
    $moisMax = 12;
    if ($annee == getDate()['year']) {
        $moisMax = intval(getDate()['month']);
    }
    $mois = rand(1, $moisMax);
    $jourMax = 31;
    if ($mois == 2) {
        $jourMax = 28;
    } else if ($mois == 1 || $mois == 3 || $mois == 5 || $mois == 7 || $mois == 8 || $mois == 10 || $mois == 12) {
        $jourMax = 31;
    } else {
        $jourMax = 30;
    }
    if ($annee == getDate()['year'] || $mois == getDate()['month']) {
        $jourMax = intval(getDate()['mday']);
    }
    $jour = rand(1, $jourMax);
    return $annee . "-" . $mois . "-" . $jour;
}

function getDepartement() {
    $pdo = openConnexion();
    $requete = "SELECT * FROM departement;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $listDepartement = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $listDepartement [] = [$ligne['numDept'], $ligne['nom']];
    }
    closeConnexion($pdo);
    return $listDepartement[rand(0, count($listDepartement) - 1)];
}

// stefan : fonction prise sur internet basé sur les expressions régulières
// suppression des accents
// petit ajout pour supprimer les espaces
function wd_remove_accents($str) {
    $str = htmlentities($str, ENT_NOQUOTES, 'utf-8');

    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    // stefan : ajout d'une ligne pour supprimer les espaces
    str_replace(" ","",$str);
    return $str;
}

function getMail($prenom, $nom) {
    $provider = ["wanadoo", "orange", "free", "alice", "caramail", "gmail"];
    $extension = ["fr", "com", "net"];
    $separatif = [".", "-", "_", ""];
    $prenom = strtolower(wd_remove_accents($prenom));
    $nom = strtolower(wd_remove_accents($nom));
    $nomPrenom = "";
    if (rand(0, 1) == 0) {
        $nomPrenom = $prenom . $separatif[rand(0, count($separatif) - 1)] . $nom;
    } else {
        $nomPrenom = $nom . $separatif[rand(0, count($separatif) - 1)] . $prenom;
    }

    return $nomPrenom . "@" . $provider[rand(0, count($provider) - 1)] . "." . $extension[rand(0, count($extension) - 1)];
}

function getAdresse() {
    $typeVoie = [
        "venelle",
        "impasse",
        "rue",
        "ruelle",
        "passage",
        "avenue",
        "boulevard",
        "carrefour",
        "square",
        "quai",
        "allée",
        "chemin",
        "chaussée",
        "route",
        "voie"
    ];
    $nomVoie = [
        "de l'Abbaye",
        "d'Abbeville",
        "Alphonse Bertillon",
        "d'Amsterdam",
        "Antoine Arnauld",
        "d'Argenson",
        "Bausset",
        "Berzélius",
        "des Célestins",
        "Charlot",
        "du Château",
        "de Cronstadt",
        "Dautancourt",
        "Des Renaudes",
        "des Écoles",
        "Edmond Valentin",
        "du Faubourg Saint-Jacques",
        "Florimont",
        "Foch",
        "de la Fontaine Aux Lions",
        "de la Fraternité",
        "George Sand",
        "Girodet",
        "Guénot",
        "du Hameau",
        "Henri Murger",
        "d'Italie",
        "des Jacobins",
        "Jasmin",
        "Jean Bouton",
        "Moncey",
        "Monplaisir",
        "Montmartre",
        "Mousset",
        "de la Muette",
        "Nollet",
        "Olivier Métra",
        "de l'Oratoire",
        "de l'Orme",
        "du Parc",
        "de la Patte d'Oie",
        "Pégoud",
        "Petit",
        "Pierre De Coubertin",
        "Pierre Lazareff",
        "Pierre Loti",
        "Rabelais",
        "de Rambervillers",
        "René Coty",
        "Rodin",
        "Rosny Aîné",
        "Sadi Carnot",
        "Saillard",
        "Saint-Fargeau",
        "Saint-Éleuthère",
        "Servan",
        "Thomire",
        "des Tourelles",
        "Truffaut",
        "Vaneau",
        "Villehardouin",
        "Verniquet",
        "Voltaire",
        "de l'Yvette",
        "d'Aguesseau",
        "Adolphe Jullien",
        "Alfred Dehodencq",
        "Auguste Métivier",
        "Bargue",
        "Barrault",
        "Bernoulli",
        "Boulitte",
        "Boileau",
        "de la Cavalerie",
        "de Capri",
        "Charles Hermite",
        "Collin",
        "de la Cité Universitaire",
        "des Deux Portes",
        "d'Édimbourg",
        "Drevet",
        "de l'Ermitage",
        "Emile Acollas",
        "Félix Éboué",
        "Eugène Beaudouin",
        "Frédéric Mourlon",
        "Florimont",
        "de la Garance",
        "Gomboust",
        "Georges Leclanché",
        "Gustave Geffroy",
        "de la Grenade",
        "Haxo",
        "Jacques Kablé",
        "de l'Hôtel de Ville",
        "Jean Lorrain",
        "Jean-Jacques Rousseau",
        "Jourdan",
        "Labat",
        "Le Tasse",
        "Liancourt",
        "Léon Delhomme",
        "de Magdebourg",
        "Louise Labé",
        "Marcadet",
        "Marguerite de Navarre",
        "Martin Bernard"
    ];
    return rand(1, 100) . " " . $typeVoie[rand(0, count($typeVoie) - 1)] . " " . $nomVoie[rand(0, count($nomVoie) - 1)];
}

function getVille() {
    $nomVille = [
        "Paris",
        "Marseille",
        "Lyon",
        "Toulouse",
        "Nice",
        "Nantes",
        "Strasbourg",
        "Montpellier",
        "Bordeaux",
        "Lille",
        "Rennes",
        "Reims",
        "Le Havre",
        "Saint-Étienne",
        "Toulon",
        "Grenoble",
        "Dijon",
        "Angers",
        "Nîmes",
        "Villeurbanne",
        "Saint-Denis",
        "Le Mans",
        "Clermont-Ferrand",
        "Aix-en-Provence",
        "Brest",
        "Limoges",
        "Tours",
        "Amiens",
        "Perpignan",
        "Metz",
        "Boulogne-Billancourt",
        "Besançon",
        "Orléans",
        "Rouen",
        "Mulhouse",
        "Caen",
        "Saint-Denis",
        "Nancy",
        "Argenteuil",
        "Saint-Paul",
        "Montreuil",
        "Roubaix",
        "Tourcoing",
        "Dunkerque",
        "Nanterre",
        "Créteil",
        "Avignon",
        "Vitry-sur-Seine",
        "Poitiers",
        "Courbevoie",
        "Fort-de-France",
        "Versailles",
        "Colombes",
        "Asnières-sur-Seine",
        "Aulnay-sous-Bois",
        "Saint-Pierre",
        "Rueil-Malmaison",
        "Pau",
        "Aubervilliers",
        "Champigny-sur-Marne",
        "Le Tampon",
        "Antibes",
        "Saint-Maur-des-Fossés",
        "La Rochelle",
        "Cannes",
        "Béziers",
        "Calais",
        "Saint-Nazaire",
        "Colmar",
        "Drancy",
        "Bourges",
        "Mérignac",
        "Ajaccio",
        "Issy-les-Moulineaux",
        "Levallois-Perret",
        "La Seyne-sur-Mer",
        "Quimper",
        "Noisy-le-Grand",
        "Valence",
        "Villeneuve-d'Ascq",
        "Neuilly-sur-Seine",
        "Antony",
        "Vénissieux",
        "Cergy",
        "Troyes",
        "Clichy",
        "Pessac",
        "Les Abymes",
        "Ivry-sur-Seine",
        "Chambéry",
        "Lorient",
        "Niort",
        "Sarcelles",
        "Montauban",
        "Villejuif",
        "Saint-Quentin",
        "Hyères",
        "Cayenne",
        "Épinay-sur-Seine",
        "Saint-André"
    ];
    return $nomVille[rand(0, count($nomVille) - 1)];
}

function getPrenom() {
    $prenom = [
        "Emma",
        "Lea",
        "Jade",
        "Manon",
        "Chloé",
        "Inès",
        "Camille",
        "Clara",
        "Sarah",
        "Lola",
        "Zoé",
        "Louise",
        "Eva",
        "Anaïs",
        "Maelys",
        "Lucie",
        "Romane",
        "Océane",
        "Juliette",
        "Marie",
        "Celia",
        "Mathilde",
        "Julie",
        "Jeanne",
        "Lisa",
        "Noémie",
        "Lou",
        "Charlotte",
        "Clémence",
        "Laura",
        "Ambre",
        "Pauline",
        "Alicia",
        "Maéva",
        "Justine",
        "Louane",
        "Anna",
        "Mélissa",
        "Nina",
        "Luna",
        "Maëlle",
        "Margot",
        "Lily",
        "Alice",
        "Elisa",
        "Elsa",
        "Julia",
        "Margaux",
        "Rose",
        "Emilie",
        "Elise",
        "Marion",
        "Mélina ",
        "Lucas",
        "Enzo",
        "Nathan",
        "Mathis",
        "Louis",
        "Hugo",
        "Maxime",
        "Jules",
        "Thomas",
        "Raphaël",
        "Gabriel",
        "Mathéo",
        "Théo",
        "Ethan",
        "Clément",
        "Yanis",
        "Arthur",
        "Léo",
        "Paul",
        "Antoine",
        "Baptiste",
        "Alexandre",
        "Axel",
        "Quentin",
        "Noa",
        "Alexis",
        "Maël",
        "Maxence",
        "Valentin",
        "Romain",
        "Kylian",
        "Matteo",
        "Esteban",
        "Mathys",
        "Victor",
        "Samuel",
        "Martin",
        "Simon",
        "Pierre",
        "Lorenzo",
        "Julien",
        "Mathieu",
        "Adrien",
        "Benjamin",
        "Nicolas",
        "Aaron"
    ];
    return $prenom[rand(0, count($prenom) - 1)];
}

function getNom() {
    $nom = [
        "Martin",
        "Bernard",
        "Thomas",
        "Dubois",
        "Durand",
        "Moreau",
        "Petit",
        "Leroy",
        "Lefèbvre",
        "Bertrand",
        "Roux",
        "David",
        "Garnier",
        "Legrand",
        "Garcia",
        "Bonnet",
        "Lambert",
        "Girard",
        "Morel",
        "Dupont",
        "Guerin",
        "Fournier",
        "Lefèvre",
        "Rousseau",
        "François",
        "Fontaine",
        "Mercier",
        "Roussel",
        "Boyer",
        "Blanc",
        "Henry",
        "Chevalier",
        "Masson",
        "Clément",
        "Perrin",
        "Lemaire",
        "Dumont",
        "Meyer",
        "Marchand",
        "Joly",
        "Gauthier",
        "Mathieu",
        "Nicolas",
        "Nguyen",
        "Robin",
        "Barbier",
        "Lucas",
        "Schmitt",
        "Duval",
        "Gautier",
        "Dufour",
        "Meunier",
        "Brunet",
        "Blanchard",
        "Leroux",
        "Caron",
        "Lopez",
        "Giraud",
        "Fabre",
        "Pierre",
        "Gaillard",
        "Sanchez",
        "Rivière",
        "Renard",
        "Perez",
        "Renault",
        "Lemoine",
        "Arnaud",
        "Colin",
        "Brun",
        "Picard",
        "Rolland",
        "Vidal",
        "Leclercq",
        "Aubert",
        "Hubert",
        "Bourgeois",
        "Roy",
        "Dupuy",
        "Louis",
        "Maillard",
        "Aubry",
        "Charpentier",
        "Benoit",
        "Berger",
        "Royer",
        "Poirier",
        "Dupuis",
        "Rodriguez",
        "Jacquet",
        "Moulin",
        "Charles",
        "Lecomte",
        "Deschamps",
        "Fernandez",
        "Guillot",
        "Collet",
        "Prévost",
        "Germain",
        "Bailly",
        "Perrot",
        "Le gall",
        "Renault",
        "Le roux",
        "Vasseur",
        "Hervé",
        "Gonzalez",
        "Barré",
        "Breton",
        "Huet",
        "Bertin",
        "Carpentier",
        "Lebrun",
        "Carré",
        "Boucher",
        "Ménard",
        "Rey",
        "Klein",
        "Weber",
        "Collin",
        "Cousin",
        "Millet",
        "Tessier",
        "Lévèque",
        "Le goff",
        "Lesage",
        "Marchal",
        "Leblanc",
        "Bouchet",
        "Etienne",
        "Jacob",
        "Humbert",
        "Bouvier",
        "Léger",
        "Perrier",
        "Pelletier",
        "Rémy"
    ];
    return $nom[rand(0, count($nom) - 1)];
}
