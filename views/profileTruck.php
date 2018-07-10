<?php include 'header.php';?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <?php include 'infoTruck.php';?>  
        </div>  

        <div class="col-sm-10">
            <br><br>
            <ul class="nav nav-tabs" id="myTab">
              <li class="nav-item">
                <a class="nav-link active" href="#commandesEnCours" data-toggle="tab">Commandes en cours</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#commandesTerminees" data-toggle="tab">Commandes terminées</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#carte" data-toggle="tab">Ma carte</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#calendrier" data-toggle="tab">Mon calendrier</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#adresses" data-toggle="tab">Mes adresses</a>
              </li>
            </ul>
            <div class="tab-content">
<!-- COMMANDES EN COURS -->
                <div class="tab-pane active" id="commandesEnCours">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Plats</th>
                                    <th>Quantité</th>
                                </tr>
                            </thead>
                            <tbody id="items">

                                <?php
                                //Recup des commandes avec date > date du jour
                                $dateJour = date("Y-m-d H:i:s");
                                $listeCommandeEnCours = [];

                                foreach ($listeCommandes as $commande){
                                    if($commande['date_commande'] >= $dateJour){
                                        array_push($listeCommandeEnCours,$commande);
                                    }
                                }

                                //Affichage
                                foreach ($listeCommandeEnCours as $commande){
                                    $nbPanier = count($commande['liste_paniers']);
                                ?>
                                    <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
                                        <td rowspan=<?php echo $nbPanier; ?>><?php echo $commande['numero']; ?></td>                   
                                        <td rowspan=<?php echo $nbPanier; ?>><?php echo $commande['date_commande']; ?></td>                   
                                        <td rowspan=<?php echo $nbPanier; ?>><?php echo $commande['total']." €"; ?></td>                   
                                        <td><?php echo $commande['liste_paniers'][0]['plat']['nom']; ?></td>                   
                                        <td><?php echo $commande['liste_paniers'][0]['quantite']; ?></td>                   
                                    </tr>
                                <?php
                                
                                    if($nbPanier > 1){
                                        for($i = 1;$i < $nbPanier;$i++){
                                ?>
                                    <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">          
                                        <td><?php echo $commande['liste_paniers'][$i]['plat']['nom'];?></td>  
                                        <td><?php echo $commande['liste_paniers'][$i]['quantite']; ?></td>                   
                                    </tr>
                                <?php
                                        }
                                    }  
                                }
                                ?>                 
                            </tbody>
                        </table>
                    </div>
                </div>
<!-- COMMANDES TERMINEES -->
                <div class="tab-pane" id="commandesTerminees">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Note</th>
                                    <th>Avis</th>
                                </tr>
                            </thead>
                            <tbody id="items">

                                <?php
                                //Recup des commandes avec date < date du jour
                                $listeCommandeTerminees = [];

                                foreach ($listeCommandes as $commande){
                                    if($commande['date_commande'] < $dateJour){
                                        array_push($listeCommandeTerminees,$commande);
                                    }
                                }

                                //Affichage
                                foreach ($listeCommandeTerminees as $commande){
                                ?>
                                    <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
                                        <td><?php echo $commande['numero']; ?></td>                   
                                        <td><?php echo $commande['date_commande']; ?></td>  
                                        <td><?php echo $commande['total']." €"; ?></td>                   
                                        <td><?php echo giveMeTheStars($commande['avis']['note']); ?></td>                                  
                                        <td><?php echo $commande['avis']['message']; ?></td>                                  
                                    </tr>                             
                                <?php
                                }
                                ?>                 
                            </tbody>
                        </table>
                    </div>
                </div>
<!-- CARTE -->
                <div class="tab-pane" id="carte">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Intitule</th>
                                    <th>prix</th>
                                    <th>description</th>
                                </tr>
                            </thead>
                            <tbody id="Plats">

                                <?php
                                foreach ($listePlats as $plat){
                                ?>
                                    <tr id="ligne<?= $plat['id'];?>" data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                        <td><input id="image<?= $plat['id'];?>" class="form-control form-control-sm" type="text" value=<?php echo $plat['image']; ?>></td>                                  
                                        <td><input id="plat<?= $plat['id'];?>" class="form-control form-control-sm" type="text" value=<?php echo $plat['nom']; ?>></td>                                  
                                        <td><input id="prix<?= $plat['id'];?>" class="form-control form-control-sm" type="text" value=<?php echo $plat['prix']." €"; ?>></td>                                  
                                        <td><input id="description<?= $plat['id'];?>" class="form-control form-control-sm" type="text" value=<?php echo $plat['description']; ?>></td>                                  
                                        <td><button id="butt<?= $plat['id'];?>" type="button" class="btn btn-warning btn-sm" onclick="saveThePlat(<?= $plat['id'];?>)"><i class="fas fa-check"></i></button></td>
                                    </tr>                             
                                <?php
                                }
                                ?>                 
                            </tbody>
                        </table>
                    </div>
                </div>  
<!-- CALENDRIER -->   
                <!-- Div SR-ONLY id du FT -->
                <input class="sr-only" id="idTruck" value=<?= $infosTruck['id'];?>>            
                <div class="tab-pane" id="calendrier">
                    <div class="table-responsive">
                        <br><br>
                        <?php
                            include 'calendar.php';
                        ?>
                    </div>
                </div>
<!-- ADRESSES --> 
                <div class="tab-pane" id="adresses">
                    <!-- Cards -->
                    <div class="d-flex justify-content-center">
                        <?php
                        foreach($listeAdresse as $adresse){
                        ?>
                        <div class="p2 cardAdresse">
                            <div class="card" style="width: 25rem;">
                                <img class="card-img-top" id="carte<?php echo $adresse['id']; ?>" src="https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=300x300&maptype=roadmap
&markers=color:red%7Clabel:C%7C<?=$adresse['latitude']?>,<?=$adresse['longitude']?>&key=AIzaSyDd0z6MCPdZ0v5TPvkbB6yWW9dli2vkN3c" alt="Card image cap">
                                <div class="card-body">
                                    <input type="text" class="input100" id="nom<?php echo $adresse['id']; ?>" value="<?=$adresse['adresse'];?>">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="updateAdresse(<?php echo $adresse['id']; ?>);">Modifier</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<?php
include 'footer.php';

function giveMeTheStars($note){
    $vides = floor(5 - $note);
    
    if((fmod($note,1) !== 0.0)){
        $middle = true;
        $pleines = 4 - $vides; 
    }else{
        $middle = false;
        $pleines = 5 - $vides; 
    }

    while($pleines > 0){
        echo '<i class="fas fa-star"  style="color:#DEDE4C"></i>';
        $pleines--;
    }

    if($middle){
        echo '<i class="fas fa-star-half-alt"  style="color:#DEDE4C"></i>';
    }

    while($vides > 0){
        echo '<i class="far fa-star"  style="color:#DEDE4C"></i>';
        $vides--;
    }

}
?>



