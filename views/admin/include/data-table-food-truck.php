 <!-- Example DataTables Card-->
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Food Trucks</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#id</th>
                  <th>N° Siret</th>
                  <th>Nom</th>
                  <th>Date création</th>
                  <th>Logo</th>
                  <th>Catégorie</th>
                  <th>Moyenne</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#id</th>
                  <th>N° Siret</th>
                  <th>Nom</th>
                  <th>Date création</th>
                  <th>Logo</th>
                  <th>Catégorie</th>
                  <th>Moyenne</th>
                </tr>
              </tfoot>
              <tbody>
              <?php foreach($listeTrucks as $key => $truck){
              ?>
              <tr>
                  <td><?php echo $truck->getFoodtruckId()->getNom(); ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><img src=<?php echo "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$truck->getFoodtruckId()->getLogo(); ?>></td>
                  <td></td>
                  <td></td>
              </tr>
              <?php }?>
              </tbody>
            </table>
          </div>
      </div>
   