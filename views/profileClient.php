<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <body>
        <?php include 'infoClient.php';?>  
        </div><!--/col-3-->
        <div class="col-sm-9">

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home" data-toggle="tab">Mes favoris</a></li>
            <li><a href="#messages" data-toggle="tab">Mes commandes en cours</a></li>
            <li><a href="#settings" data-toggle="tab">Mon historique des commandes</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                        <?php 
                            use BWB\Framework\mvc\controllers\FavorisController;
                            use BWB\Framework\mvc\dao\DAOFavoris;
                            use BWB\Framework\mvc\models\TrucksModel;
                            
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
                            //var_dump($truck);
                                ?>
                    <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
                        <td><img src=<?php echo "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$truck->getFoodtruckId()->getLogo(); ?>></td>
                                <td><?php echo $truck->getFoodtruckId()->getNom(); ?></td>
                                <td>usato loreal</td>
                                <td>colore rosso</td>
                                <td>il cliente preferisce il verde</td>
                                <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-star"></span></button></td>
                        <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                    </tr>
                           <?php 
                           
                        }
                        ?>
                        
                        
                </tbody>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>


