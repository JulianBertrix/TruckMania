<table class="table table-hover text-center">
    <thead>
        <tr>
            <th>Date</th>
            <th>Food Truck</th>
            <th>Plat</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Avis</th>
        </tr>
    </thead>
    <tbody id="items">
        <?php foreach ($listeCommande as $key => $commande){
                if($commande->getDateCommande() <= date("Y-m-d H:i:s")){
            ?>
        <tr>
            <td><?php echo date_format(date_create_from_format('Y-m-d H:i:s', $commande->getDateCommande()), 'd/m/Y H:i'); ?></td>
            <td><?php echo $commande->getFoodtruckId()->getNom(); ?></td>
            <td>
                <ul class="listeSansPuce">
            <?php 
            foreach ($fullCommande as $key => $value){
                if($value["numero"] === $commande->getNumero()){
                    foreach ($value["liste_paniers"] as $panier){                   
                        ?><li><?php echo $panier["plat"]["nom"]; ?></li><?php                   
                    }?>
                </ul>
            </td>
            <td>   
                <ul class="listeSansPuce">       
                <?php 
                foreach ($value["liste_paniers"] as $panier){?>
                    <li><?php echo $panier["quantite"]; ?></li>
                <?php
                    }
                }
            }
                ?>
                </ul>
            </td>
            <td><?php echo $commande->getTotal();?> €</td>
            <?php if($commande->getAvisId()->getMessage() !== ""){?>
            <td>
                <ul class="listeSansPuce">
                    <li><?php echo $commande->getAvisId()->getMessage(); ?></li>
                    <li><?php echo giveMeTheStars($commande->getAvisId()->getNote()); ?></li>
                </ul>
            </td>
            <?php }
            else{
            ?><td><button type="button" data-toggle="modal" data-target="#avis" data-uid="1" data-productid="<?php echo $commande->getAvisId()->getId(); ?>" class="update btn btn-warning btn-sm" onclick="showModal();"><span class="fas fa-pencil-alt"></span></button></td>
            <?php }?>
       </tr>
        <?php
           }
        }
        ?>
    </tbody>
</table>
<div>
    <?php include 'avisModal.php'; 
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
</div>
