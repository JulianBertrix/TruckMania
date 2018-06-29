    
<?php include 'header.php'; ?>
        
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1>Mon Profile</h1></div>
        <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src=""></a></div>
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
            
        <?php include 'infoClient.php';?>  
        </div>
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
    </div>
</div>
<?php// include 'footer.php'; ?>



