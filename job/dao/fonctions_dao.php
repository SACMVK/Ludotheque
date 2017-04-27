<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
            Function selectDico($table,$colonne){
                
                // M : Connecxion a la BD
                $pdo = openConnexion();
                        $reponse = "SELECT * FROM ".$table."";
                        $stmt = $pdo->prepare($reponse);
                        $stmt->execute() ;
                        // Apparait champs de recherche en blanc si ne souhaite pas recherche sur ce champs
                        ?>
                        <option value="aucune"> </option>
                        <?php
                        //Création d'une liste pour y insérer les résultat du dico et pouvoir les trier
                        $ResDico=array();
                        while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC))
                            { 
                            $estDedans = in_array($donnees[$colonne], $ResDico);
                           if(!$estDedans) 
                                    {$ResDico[]=$donnees[$colonne];
                            } //Je souhaite insérer la valeurs si elle n'est pas déjà présente dans la liste
                           // $ResDico[]=$donnees[$colonne];
                            }
                            asort($ResDico);
                            foreach ($ResDico as $valueDico) {
                                
                            ?>
                        <option value="<?php echo $valueDico; ?>"><?php echo $valueDico; ?></option>
                        <?php }         
            
            }
            

            ?>