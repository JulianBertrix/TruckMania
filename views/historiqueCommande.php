<table class="table table-hover">
    <thead>
        <tr>
            <th>Date</th>
            <th>Food Truck</th>
            <th>Plat</th>
            <th>Quantité</th>
            <th>prix</th>
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
            <td><?php echo $total ?></td>
            <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
        </tr>
    </tbody>
</table>

