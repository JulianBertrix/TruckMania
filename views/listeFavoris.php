<table class="table table-hover text-center">
    <thead>
        <tr>
            <th>logo</th>
            <th>food truck</th>
            <th>retirer des favoris</th>
            <th>acceder au profile</th>
        </tr>
    </thead>
    <tbody id="items">

        <?php
        foreach ($listeFavoris as $key => $truck){
        ?>
        <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
            <td><img src=<?php echo "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$truck->getFoodtruckId()->getLogo(); ?>></td>
            <td><?php echo $truck->getFoodtruckId()->getNom(); ?></td>                   
            <td><button class="update btn btn-warning btn-sm" onclick="deleteFavoris(
                        <?php echo $truck->getFoodtruckId()->getId(); ?>)"><span class="fa fa-star"></span></button></td>
            <td><button class="btn btn-default btn-xs" onclick="getProfile(
                        <?php echo $truck->getFoodtruckId()->getId(); ?>)"><span class="fa fa-eye"></span></button></td>
        </tr>
       <?php 
        }
        ?>                  
    </tbody>
</table>

