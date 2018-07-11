<table class="table table-hover text-center">
    <thead>
        <tr>
            <th>Date</th>
            <th>Food Truck</th>
            <th>Plat</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Rediger un avis</th>
        </tr>
    </thead>
    <tbody id="items">
        <?php foreach ($listeCommande as $key => $commande){
                if($commande->getDateCommande() <= date("Y-m-d H:i:s")){
            ?>
        <tr>
            <td><?php echo $commande->getDateCommande(); ?></td>
            <td><?php echo $commande->getFoodtruckId()->getNom(); ?></td>
            <td>
            <?php 
            foreach ($fullCommande as $key => $value){
                if($value["numero"] === $commande->getNumero()){
                    foreach ($value["liste_paniers"] as $panier){                   
                        ?><li><?php echo $panier["plat"]["nom"]; ?></li><?php                   
                    }?>
            </td>
            <td>          
                <?php 
                foreach ($value["liste_paniers"] as $panier){?>
                    <li><?php echo $panier["quantite"]; ?></li>
                <?php
                    }
                }
            }
                ?>
            </td>
            <td><?php echo $commande->getTotal();?> €</td>
            <?php if($commande->getAvisId()->getMessage() !== ""){?>
            <td>avis posté</td>
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
    <?php include 'avisModal.php'; ?>
</div>
