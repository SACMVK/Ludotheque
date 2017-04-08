<?php
require_once '../../controller/controllerRequete.php ';
?>

<div class="container" id="wrap">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form action=" createRequestFromPOST()" method="post" accept-charset="utf-8" class="form" role="form">   
                <legend> Trouver un compte</legend>

                <input type="text" name="nom" class="form-control input-lg" maxlength="12" placeholder="Nom"  /> 

                <input type="text" name="prenom" class="form-control input-lg" maxlength="12" placeholder="Prénom"  />   

                <input type="date" name="dateNaiss" class="form-control input-lg" min="1920-01-01" maxlength="10" placeholder="Date De Naissance (mm/dd/yyyy)"/>

                <input type="text" name="ville" class="form-control input-lg" maxlength="12" placeholder="Ville"/>
                
                <input type="number" name="numDept" class="form-control input-lg" maxlength="5" placeholder="Numero de département"/>


                <input type="email" name="email" class="form-control input-lg" placeholder="E-mail"/>

                <input type="hidden" name="page" value="individu selectList"  />
           
                <input type="submit" name="submit" value="Recherche">
                <input type="reset" value="Réinitialiser">
            </form>          
        </div>
    </div>            
</div>