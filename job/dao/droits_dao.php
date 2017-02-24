<?php




Function loadDroits(){
	
	
	/* stefan : Ouverture de la connexion
	 */
	$pdo = openConnexion();

	
	/* stefan : Déclaration d'une variable de table
	 */
	$table = 'droit';
	
	/* stefan : Préparation de la requête.
	 */
	$requete = "SELECT * FROM ".$table.";";
	$stmt = $pdo->prepare($requete);
	
	
	/* stefan : Exécution de la requête
	 */
	$stmt->execute() ;

	
	/* stefan : Déclaration de la variable retournée de la fonction..
	 */
	$liste_droits = null;
	
	/* stefan : Parcours des résultats.
	 * La fonction fetch() permet de passer
	 * à la ligne suivante.
	 * Chaque ligne retournée est un array.
	 * L'attribut PDO::FETCH_ASSOC permet de sortir
	 * un array dont la clé de chaque valeur
	 * est le nom de sa colonne.
	 * Si on n'entre pas d'attribut, on doit récupérer
	 * la valeur par le numéro de colonne,
	 * ce qui n'est pas forcément pratique.
	 */
	while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$liste_droits [] = $ligne['droit'];
	}
	
	
	/* stefan : Fermeture de la connexion
	 */
	closeConnexion($pdo);
	
	/* stefan : La valeur retournée est un array
	 */
	return $liste_droits;
}
