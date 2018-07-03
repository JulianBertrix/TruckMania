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
            <td><?php echo $total ?> €</td>
            <td><button type="button" data-toggle="modal" data-target="#avis" data-uid="1" class="update btn btn-warning btn-sm"><span class="fas fa-pencil-alt"></span></button></td>
        </tr>
    </tbody>
</table>
<div>
    <?php include 'avisModal.php'; ?>
</div>
