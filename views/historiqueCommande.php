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
            foreach ($listeCommande as $value){
                ?>
                <tr>
                    <td><?php echo $dateCommande; ?></td>
                    <td><?php echo $foodtruck; ?></td>
                    <td>
                    <?php foreach ($listePlat as $key => $nom){
                        ?><li><?php echo $nom; ?></li><?php
                    }?></td>
                    <td>
                    <?php foreach ($listeQuantite as $key => $nom){
                        ?><li><?php echo $nom; ?></li><?php
                    }?></td>
                    <td><?php echo $total ?></td>
                    <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                </tr>
            <?php
            }?>
    </tbody>
</table>

