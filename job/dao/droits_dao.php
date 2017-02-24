<?php




Function loadDroits(){
	
	
	/* stefan : Ouverture de la connexion
	 */
	$pdo = openConnexion();

	
	/* stefan : D�claration d'une variable de table
	 */
	$table = 'droit';
	
	/* stefan : Pr�paration de la requ�te.
	 */
	$requete = "SELECT * FROM ".$table.";";
	$stmt = $pdo->prepare($requete);
	
	
	/* stefan : Ex�cution de la requ�te
	 */
	$stmt->execute() ;

	
	/* stefan : D�claration de la variable retourn�e de la fonction..
	 */
	$liste_droits = null;
	
	/* stefan : Parcours des r�sultats.
	 * La fonction fetch() permet de passer
	 * � la ligne suivante.
	 * Chaque ligne retourn�e est un array.
	 * L'attribut PDO::FETCH_ASSOC permet de sortir
	 * un array dont la cl� de chaque valeur
	 * est le nom de sa colonne.
	 * Si on n'entre pas d'attribut, on doit r�cup�rer
	 * la valeur par le num�ro de colonne,
	 * ce qui n'est pas forc�ment pratique.
	 */
	while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$liste_droits [] = $ligne['droit'];
	}
	
	
	/* stefan : Fermeture de la connexion
	 */
	closeConnexion($pdo);
	
	/* stefan : La valeur retourn�e est un array
	 */
	return $liste_droits;
}