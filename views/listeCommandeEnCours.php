<table class="table table-hover">
    <thead>
        <tr>
            <th>Date</th>
            <th>Food Truck</th>
            <th>Plat</th>
            <th>Quantité</th>
            <th>prix</th>
        </tr>
    </thead>
    <tbody id="items">       
        <tr>
            <td><?php echo $dateCommandeEnCours; ?></td>
            <td><?php echo $foodtruckEnCours; ?></td>    
            <td>
                
            <?php 
            if($listePlatEnCours != NULL){
                foreach ($listePlatEnCours as $plat){
                    ?><li><?php echo $listePlatEnCours; ?></li><?php
                }
            }
            ?></td>
            <td>
            <?php 
            if(isset($listeQuantiteEnCours)){
                foreach ($listeQuantiteEnCours as $quantite){
                    ?><li><?php echo $quantite; ?></li><?php
                }
            }
            ?></td>
            <td><?php echo $totalEnCours ?></td>
        </tr>         
    </tbody>
</table>
