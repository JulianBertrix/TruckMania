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
        </tr>
    </thead>
    <tbody id="items">
        <?php
            foreach ($listeCommandeEnCours as $value){
                ?>
                <tr>
                    <td><?php echo $dateCommandeEnCours; ?></td>
                    <td><?php echo $foodtruckEnCours; ?></td>    
                    <td>
                    <?php foreach ($listePlatEnCours as $key => $nom){
                        ?><li><?php echo $nom; ?></li><?php
                    }?></td>
                    <td>
                    <?php foreach ($listeQuantiteEnCours as $key => $nom){
                        ?><li><?php echo $nom; ?></li><?php
                    }?></td>
                    <td><?php echo $totalEnCours ?></td>
                </tr>
            <?php
            }?>
    </tbody>
</table>
