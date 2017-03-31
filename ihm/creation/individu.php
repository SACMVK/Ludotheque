

<form method="post" action="index.php">



<!-- Choix d'un nom -->
<div class="row">
<div id="pseudo">
<div class="col-md-2">
<label>Nom: <input type="text" name="nom"/></label><br/>
</div>
</div>
</div>



<!-- Choix d'un prenom -->
<div class="row">
<div id="pseudo">
<div class="col-md-2">
<label>Prenom: <input type="text" name="prenom"/></label><br/>
</div>
</div>
</div>





<!-- Choix d'un pseudo -->
<div class="row">
<div id="pseudo">
<div class="col-md-2">
<label>Pseudo: <input type="text" name="pseudo"/></label><br/>
</div>
</div>
</div>





<div class="row">
<div id="mdp">
<div class="col-md-2">
<div id="codepostal">
<label>Mot de passe: <input type="password" name="mdp"/></label><br/>
</div>
</div>
</div>


<div class="row">
<div id="mdp2">
<div class="col-md-2">
<div id="codepostal">
<label>Confirmation du mot de passe: <input type="password" name="mdp2"/></label><br/>
</div>
</div>
</div>


<!-- Mail -->
<div class="row">
<div id="mail">
<div class="col-md-2">
<label>Adresse e-mail: <input type="text" name="mail"/></label><br/>
</div>
</div>
</div>





<!-- ici on offre le choix à la personne de choisir son sexe -->
<input type="radio" name="sexe" value="Homme" id="Homme" checked="checked"/> <label for="Homme">Homme</label>
<input type="radio" name="sexe" value="Femme" id="Femme" /> <label for="Femme">Femme</label></div>
<br/>



<!-- ici, sa date de naissance -->
<div class="row">
<div class="col-md-2">
<div id="datenaissance">
Votre date de naissance :
<input type="date" max="2012-06-25" min="2011-08-13" name="datenaissance">
</div>
</div>
</div>



<br/>
<!-- Telephone -->
<div class="row">
<div class="col-md-2">
<div id="tel">
<td><label> Téléphone:</label></td>
<td><input type="text" class="style" value=""   name="tel"/></td>
</div>
</div>
</div>






<!-- Adresse -->
<div class="row">
<div class="col-md-2">
<div id="adresse">
<p>ADRESSE</p>
</div>
</div>
</div>
<input type=text name="adresse" rows="5" size="250" maxlength="100" required/>
</div>





<br>
<!-- Code Postal -->
<div class="row">
<div id="contenant11">
<div class="col-md-2">
<div id="codepostal">
<p>Code Postal</p>
</div>
</div>

<input type=text name="codepostal" rows="5" size="250" maxlength="10" required/>



</div>

</div>


<br>

<!--Ville -->
<div class="row">
<div class="col-md-2">
<div id="ville">
<p>Ville</p>
</div>
</div>

<input type=text name="ville" rows="5" size="250" maxlength="100" required/>



</div>

</div>

<br>


<br>



<input type="submit" NAME="validation" VALUE="Envoyer"/>







<br>


</form>


