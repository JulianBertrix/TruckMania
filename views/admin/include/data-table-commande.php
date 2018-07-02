<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Commandes</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Date Commande</th>
                  <th>Utilisateur Id</th>
                  <th>Food Truck Id</th>
                  <th>Avis Id</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>N°</th>
                  <th>Date Commande</th>
                  <th>Utilisateur Id</th>
                  <th>Food Truck Id</th>
                  <th>Avis Id</th>
                  <th>Total</th>
                </tr>
              </tfoot>
              <tbody>
              <?php foreach($listeTrucks as $key => $truck){
              ?>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <?php }?>
              </tbody>
            </table>
          </div>
      </div>
   