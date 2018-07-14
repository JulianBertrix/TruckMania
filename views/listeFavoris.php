<table class="table table-hover text-center">
    <thead>
        <tr>
            <th>Logo</th>
            <th>Food Truck</th>
            <th>Retirer des favoris</th>
            <th>Accéder au profil</th>
        </tr>
    </thead>
    <tbody id="items">

        <?php
        foreach ($listeFavoris as $key => $truck){
        ?>
        <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
            <td><img class="imageSmall" src=<?php echo "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$truck->getFoodtruckId()->getLogo(); ?>></td>
            <td><?php echo $truck->getFoodtruckId()->getNom(); ?></td>                   
            <td><button class="update btn btn-outline-warning btn-sm" onclick="deleteFavoris(
                        <?php echo $user->username[0].",".$truck->getFoodtruckId()->getId(); ?>)"><span class="fa fa-star"></span></button></td>
            <td><a <?php echo "href=http://".$_SERVER['SERVER_NAME'] ."/foodtruck/".$truck->getFoodtruckId()->getId(); ?>><button class="btn btn-outline-info btn-sm"><span class="fa fa-eye"></span></button></a></td>
        </tr>
       <?php 
        }
        ?>                  
    </tbody>
</table>

