<?php






/* stefan : titre page
 */
echo '<h1>Connexion</h1>';


/* stefan : test de récupération des données de connexion dans une variable PHP
 */
//echo utf8_encode(miseAJourBienvenu());



$affichage_connexion = '<div id=connexion><form name=connexion action="index.php" method="POST">';
$affichage_connexion .= '<LABEL class=text for=pseudo >Login</LABEL>';
$affichage_connexion .= '<div><input type=text class=input name=pseudo></input></div>';
$affichage_connexion .= '<br>';
$affichage_connexion .= '<LABEL class=text for=mdp >Mot de passe</LABEL>';
$affichage_connexion .= '<div><input type=password class=input name=mdp></input></div>';
$affichage_connexion .= '<br>';
$affichage_connexion .= '<div><input type=submit class=bouton_connexion value="Se connecter"/></div>';
$affichage_connexion .= '</form></div>';



echo utf8_encode($affichage_connexion);

Function miseAJourBienvenu(){
	$paramConnexion = ['pseudo','mdp'];
	$bienvenu = 'mmmh, ce n\'est pas très sécurisé tout ça !<BR>';
	foreach ( $paramConnexion as  $param ) {
		/* stefan : on commence par un test pour savoir si la clé existe dans $_POST :
		 * si la page est chargée, le $_POST est vide.
		 * $_POST contiendra les valeurs à mettre à jour une fois submit cliqué.
		 */
		if(array_key_exists($param,$_POST)){
			$bienvenu .= $param.' : 	'.$_POST[$param].'<BR>';
		}
	}
	return $bienvenu;
}


?>