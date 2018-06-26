<table class="table table-hover">
    <thead>
        <tr>
            <?php
                use BWB\Framework\mvc\controllers\CommandeController;
                use BWB\Framework\mvc\dao\DAOCommande;
                use BWB\Framework\mvc\models\CommandeModel;
                use BWB\Framework\mvc\controllers\PanierController;
                use BWB\Framework\mvc\dao\DAOPanier;
                use BWB\Framework\mvc\models\PanierModel;
                use BWB\Framework\mvc\models\PlatModel;
            ?>
            <th>Date</th>
            <th>Food Truck</th>
            <th>Plat</th>
            <th>Quantité</th>
            <th>prix</th>
            <th>Rediger un avis</th>
        </tr>
    </thead>
    <tbody id="items">
        <?php
            $filter = ["utilisateur_id" => 1];
            $commande = (new CommandeController())->getAllBy($filter);
            foreach ($commande as $key => $value){
                if($value->getDateCommande() <= date("Y-m-d H:i:s")){
                ?>
                <tr>
                    <td><?php echo $value->getDateCommande(); ?></td>
                    <td><?php echo $value->getFoodtruckId()->getNom(); ?></td>
                        <?php 
                        $panierFilter = ["commande_numero" => $value->getNumero()];
                        $panier = (new PanierController())->getAllPanierBy($panierFilter); 
                        $plat = array();
                        $quantite = array();
                        foreach ($panier as $key => $val){ 
                            if ($value->getNumero() === $val->getNumeroCommande()->getNumero()){
                                array_push($plat, $val->getPlatId()->getNom());
                                array_push($quantite, $val->getQuantite());
                            }
                        }
                        ?>            
                    <td>
                    <?php foreach ($plat as $key => $nom){
                        ?><li><?php echo $nom; ?></li><?php
                    }?></td>
                    <td>
                    <?php foreach ($quantite as $key => $nom){
                        ?><li><?php echo $nom; ?></li><?php
                    }?></td>
                    <td><?php echo $value->getTotal(); ?></td>
                    <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                </tr>
            <?php
                }
            }?>
    </tbody>
</table>

