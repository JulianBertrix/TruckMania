<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Evénements</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th># Id</th>
                  <th>Date Création</th>
                  <th>Intitulé</th>
                  <th>Date Début</th>
                  <th>Date Fin</th>
                  <th>Description</th>
                  <th>Logo</th>
                  <th>Nbr Participant</th>
                  <th>Utilisitateur Id</th>
                  <th>Adresse Id</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th># Id</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>E-Mail</th>
                  <th>Password</th>
                  <th>Rôle</th>
                  <th>Adresse Id</th>
                  <th>Food Truck Id</th>
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
   