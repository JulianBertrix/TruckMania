<?php include 'header.php';
//Recup des commandes avec date > date du jour
$dateJour = date("Y-m-d H:i:s");
$listeCommandeEnCours = [];
foreach ($listeCommande as $commande){
    if($commande->getDateCommande() >= $dateJour){
        array_push($listeCommandeEnCours,$commande);
    }
}
?>
 
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3"><!--left col-->
            <?php include 'infoClient.php';?>  
        </div>  

        <div class="col-sm-9">
            <br><br>
            <ul class="nav nav-tabs" id="myTab">
              <li class="nav-item">
                <a class="nav-link active" href="#favoris" data-toggle="tab">Mes favoris</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#commandes" data-toggle="tab">Commandes en cours <span class="badge badge-pill badge-danger"><?= count($listeCommandeEnCours)?></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#historique" data-toggle="tab">Mon historique</a>
              </li>
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
    </div>
</div>
<?php
include 'footer.php'; 
?>



