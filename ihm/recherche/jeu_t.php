</br></br>
<h1>Rechercher un jeu théorique</h1>

<div class="container" id="wrap">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action=" " method="post" accept-charset="utf-8" class="form" role="form">
                <label class="form-control input-lg" maxlength="12">Type de produit recherché
                    <select name="typePC">
                        <?php selectDico("type_p_c_d","typePC") ?>
                    </select>
                </label>
                <label class="form-control input-lg" maxlength="12">Nom du produit: 
                    <input type="text" name="nom"/>
                </label>
                </br>
                <label class="form-control input-lg" maxlength="12">Nom de l'éditeur
                    <select name="editeur">
                        <?php selectDico("editeur_d","editeur") ?>
                    </select>
                </label>
                <label class="form-control input-lg" maxlength="12">Ville: 
                    <input type="text" name="ville"/>
                </label>
                </br>
                <label class="form-control input-lg" min="1000" maxlength="10">Année de sortie: 
                    <input type="year" name="anneeSortie" placeholder="Année (yyyy)"/>
                </label>
                <label class="form-control input-lg" maxlength="5">Département
                    <select name="departement">
                        <?php selectDico("departement","numDept") ?>
                    </select>
                </label>
                </br>
                <label class="form-control input-lg" maxlength="5">Nombre de joueurs maximum
                    <select name="nbJoueurMax">
                        <?php selectDico("jeu_t","nbJoueursMax") ?>
                    </select>
                </label>
                <label class="form-control input-lg" maxlength="12">Public
                    <select name="public">
                        <?php selectDico("public_d","public") ?>
                    </select>
                </label>
                </br>
                <label class="form-control input-lg" maxlength="12">Difficulté
                    <select name="difficulte">
                        <?php selectDico("difficulte_d","difficulte") ?>
                    </select>
                </label>
                <label class="form-control input-lg" maxlength="5">Durée de la partie
                    <select name="dureePartie">
                        <?php selectDico("jeu_t","dureePartie") ?>
                    </select>
                </label>
                </br>

                <input type="hidden" name="page" value="jeu_t selectList"  />
           
                <input type="submit" name="submit" value="Recherche jeu">
                <input type="reset" value="Réinitialiser">
            </form>
        </div>
    </div>            
</div>