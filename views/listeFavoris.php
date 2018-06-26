
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
        $filter = ["utilisateur_id" => 1];
        $favoris = (new FavorisController())->getAllBy($filter);

        foreach ($favoris as $key => $truck){
        ?>
        <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
            <td><img src=<?php echo "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$truck->getFoodtruckId()->getLogo(); ?>></td>
                    <td><?php echo $truck->getFoodtruckId()->getNom(); ?></td>
                    <?php
                        $presenceFilter = ['foodtruck_id' => $truck->getFoodtruckId()->getId()];
                        $presence = (new PresenceController())->getAllBy($presenceFilter);
                        $dateDebut = array();
                        $adresse = array();
                        $dateFin = array();

                        foreach ($presence as $key => $value){
                            if ($value->getFoodtruckId()->getId() === $truck->getFoodtruckId()->getId()){
                                array_push($adresse, $value->getAdresseId()->getAdresse());                                       
                                array_push($dateDebut, $value->getPlanningId()->getDateDebut());                                       
                                array_push($dateFin, $value->getPlanningId()->getDateFin());
                            }
                        } 
                        ?>
                        <td>
                        <?php foreach ($adresse as $key => $value){
                            ?><li><?php echo $value; ?></li><?php
                        }?></td>
                        <td>
                        <?php foreach ($dateDebut as $key => $value){
                            ?><li><?php echo $value; ?></li><?php
                        }?></td>
                        <td>
                        <?php foreach ($dateFin as $key => $value){
                            ?><li><?php echo $value; ?></li><?php
                        }?></td>
                    <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-star"></span></button></td>
            <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
        </tr>
       <?php 
        }
        ?>                  
    </tbody>
</table>

