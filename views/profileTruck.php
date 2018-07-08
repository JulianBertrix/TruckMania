<?php include 'header.php';?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <?php include 'infoTruck.php';?>  
        </div>  

        <div class="col-sm-10">
            <br><br>
            <ul class="nav nav-tabs" id="myTab">
              <li class="nav-item">
                <a class="nav-link active" href="#favoris" data-toggle="tab">Mes favoris</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#commandes" data-toggle="tab">Commandes en cours</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#historique" data-toggle="tab">Mon historique</a>
              </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="favoris">
                    <div class="table-responsive">
                        <?php //include 'listeFavoris.php';?>
                        <div class="row">
                          <div class="col-md-6 col-md-offset-4 text-center">
                                <ul class="pagination" id="myPager"></ul>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="commandes">
                    <div class="table-responsive">
                        <?php //include 'listeCommandeEnCours.php';?>
                    </div> 
                </div>
                
                <div class="tab-pane" id="historique">
                    <div class="table-responsive">
                        <?php //include 'historiqueCommande.php'; ?>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php
include 'footer.php'; 
?>



