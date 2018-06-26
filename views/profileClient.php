<html>
    <head>
        <link src="profileClient.js">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <body>
        <?php include 'infoClient.php';?>  
        </div><!--/col-3-->
        <div class="col-sm-9">

            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#favoris" data-toggle="tab">Mes favoris</a></li>
              <li><a href="#commandes" data-toggle="tab">Mes commandes en cours</a></li>
              <li><a href="#historique" data-toggle="tab">Mon historique des commandes</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="favoris">
                    <div class="table-responsive">
                        <?php include 'listeFavoris.php';?>
                        <div class="row">
                          <div class="col-md-6 col-md-offset-4 text-center">
                                <ul class="pagination" id="myPager"></ul>
                          </div>
                        </div>
                    </div><!--/table-resp-->
                </div><!--/tab-pane-->
                <div class="tab-pane" id="commandes">
                    <div class="table-responsive">
                            <?php include 'listeCommandeEnCours.php';?>
                        </div> 
                </div><!--/tab-pane-->
                
                <div class="tab-pane" id="historique">
                    <div class="table-responsive">
                        <?php include 'historiqueCommande.php'; ?>
                    </div>
                </div>
            </div> 
        </div>
    </body>
</html>


