<table class="table table-hover">
    <thead>
        <tr>
            <?php 
                use BWB\Framework\mvc\controllers\FavorisController;
                use BWB\Framework\mvc\dao\DAOFavoris;
                use BWB\Framework\mvc\models\TrucksModel;
                use BWB\Framework\mvc\controllers\PresenceController;
                use BWB\Framework\mvc\dao\DAOPresence;
                use BWB\Framework\mvc\models\PresenceModel;

            ?>
            <th>logo</th>
            <th>food truck</th>
            <th>emplacement</th>
            <th>date de debut</th>
            <th>date de fin</th>
            <th>options</th>
        </tr>
    </thead>
    <tbody id="items">

        <?php
        foreach ($listeFavoris as $key => $truck){
        ?>
        <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
            <td><img src=<?php echo "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$truck->getFoodtruckId()->getLogo(); ?>></td>
                    <td><?php echo $truck->getFoodtruckId()->getNom(); ?></td>
                    <td>
                    <?php foreach ($listeAdresse as $key => $value){
                        ?><li><?php echo $value; ?></li><?php
                    }?></td>
                    <td>
                    <?php foreach ($listeDateDebut as $key => $value){
                        ?><li><?php echo $value; ?></li><?php
                    }?></td>
                    <td>
                    <?php foreach ($listeDateFin as $key => $value){
                        ?><li><?php echo $value; ?></li><?php
                    }?></td>
                    <td><button class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-star"></span></button></td>
            <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
        </tr>
       <?php 
        }
        ?>                  
    </tbody>
</table>

