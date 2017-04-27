<div class="container" id="wrap">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form action=" " method="post" accept-charset="utf-8" class="form" role="form">   
                <legend> Trouver un jeu </legend>

                <input type="text" name="nom" class="form-control input-lg" maxlength="12" placeholder="Nom de jeu"  /> 

                <input type="text" name="etat" class="form-control input-lg" maxlength="12" placeholder="état de jeu"  />   
                
                <input type="date" name="anneeSortie" class="form-control input-lg" min="1920-01-01" maxlength="10" placeholder="Date De Sortie (mm/dd/yyyy)"/>

                <input type="text" name="public" class="form-control input-lg" maxlength="12" placeholder="public "/>

                <input type="hidden" name="page" value="jeu_p selectList"  />
           
                <input type="submit" name="submit" value="Recherche">
                <input type="reset" value="Réinitialiser">
            </form>          
        </div>
    </div>            
</div>
