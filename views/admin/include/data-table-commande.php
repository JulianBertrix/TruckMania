<!-- Example DataTables Card-->
<div class="card mb-3" id="card-commande">
        <div class="card-header">
        <i class="fa fa-fw fa-shopping-cart"></i> Commandes</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="container-fluid">
            <table id="" class="table table-striped table-bordered text-center" style="width:100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Date</th>
                  <th>Utilisateur</th>
                  <th>Truck</th>
                  <th>Avis</th>
                  <th>Total</th>
                  <th>Supprimer</th>
                </tr>
              </thead>
                <tbody>
                <?php 
                use BWB\Framework\mvc\models\CommandeModel;
                foreach ($listeCommande as $commandes){
                    ?>
                    <tr>
                      <td><?php echo $commandes->getNumero(); ?></td>
                      <td><?php echo $commandes->getDateCommande(); ?></td>
                      <td><?php echo $commandes->getUtilisateurId()->getNom(); ?></td>
                      <td><?php echo $commandes->getfoodTruckId()->getNom(); ?></td>
                      <td><?php echo $commandes->getAvisId()->getMessage(); ?></td>
                      <td><?php echo $commandes->getTotal(); ?>€</td>
                      <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                  <?php }
                ?>
               </tbody>
              <tfoot>
                <tr>
                  <th>N°</th>
                  <th>Date</th>
                  <th>Utilisateur</th>
                  <th>Truck</th>
                  <th>Avis</th>
                  <th>Total</th>
                  <th>Supprimer</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
   