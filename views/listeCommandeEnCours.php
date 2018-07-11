<table class="table table-hover">
    <thead>
        <tr>
            <th>Date</th>
            <th>Food Truck</th>
            <th>Plat</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody id="items">       
        <?php foreach ($listeCommande as $key => $commande){
                if($commande->getDateCommande() > date("Y-m-d H:i:s")){
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
        </tr>
        <?php }
        }?>
    </tbody>
</table>
