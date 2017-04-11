<?php

function supprimer_donnees_individu() {
    $pdo = openConnexion();
    $requeteDelete = "DELETE * FROM individu";
    $stmt = $pdo->prepare($requeteDelete);
    $stmt->execute();
    $requeteDelete = "DELETE * FROM compte";
    $stmt = $pdo->prepare($requeteDelete);
    $stmt->execute();
    closeConnexion($pdo);
}

function generer_donnees_individu(int $nombreIndividus) {
    for ($indice = 0; $indice < $nombreIndividus; $indice++) {
        $prenom = getPrenom();
        $nom = getNom();
        $departement = getDepartement();
        echo "<b>" . $prenom . " " . $nom . "</b><br>";
        echo getMail($prenom, $nom) . "<br>";
        echo "Droits d'utilisateur : " . getDroit() . "<br>";
        echo "Né(e) le : " . getDate_(1950) . "<br>";
        echo "Inscrit(e) le : " . getDate_(2016) . "<br>";
        echo getAdresse() . " à " . getVille() . " dans le " . $departement[0] . " (" . $departement[1] . ")<br><br>";
        //insert($list);
    }
}

function getDroit() {
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
function getDate_(int $dateMini) {
    $annee = rand($dateMini, getDate()['year']);
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
    return $jour . "/" . $mois . "/" . $annee;
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
function wd_remove_accents($str, $charset = 'utf-8') {
    $str = htmlentities($str, ENT_NOQUOTES, $charset);

    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

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
