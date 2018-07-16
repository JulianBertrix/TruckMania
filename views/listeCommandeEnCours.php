<table class="table table-hover">
    <thead>
        <tr>
            <th>Date</th>
            <th>Food Truck</th>
            <th>Plat</th>
            <th>Quantité</th>
            <th>Montant</th>
        </tr>
    </thead>
    <tbody id="items">       
        <?php foreach ($listeCommande as $key => $commande){
                if($commande->getDateCommande() > date("Y-m-d H:i:s")){
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
        </tr>
        <?php }
        }?>
    </tbody>
</table>
