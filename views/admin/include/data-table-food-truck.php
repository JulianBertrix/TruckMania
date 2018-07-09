 <!-- Example DataTables Card-->
 <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-truck"></i> Food Trucks</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="container-fluid">
              <table id="" class="table table-striped table-bordered text-center" style="width:100%">
                <thead>
                    <tr>
                      <th>Id</th>
                      <th>N° Siret</th>
                      <th>Nom</th>
                      <th>Création</th>
                      <th>Logo</th>
                      <th>Catégorie</th>
                      <th>Moyenne</th>
                      <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  use BWB\Framework\mvc\models\TrucksModel;
                  foreach ($listeTrucks as $trucks){
                    ?>
                    <tr>
                      <td><?php echo $trucks->getId(); ?></td>
                      <td><?php echo $trucks->getSiret(); ?></td>
                      <td><?php echo $trucks->getNom(); ?></td>
                      <td><?php echo $trucks->getDateCreation(); ?></td>
                      <td><?php echo $trucks->getLogo(); ?></td>
                      <td><?php echo $trucks->getCategorieId()->getIntitule(); ?></td>
                      <td><?php echo $trucks->getMoyenne(); ?></td>
                      <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                  <?php }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>N° Siret</th>
                      <th>Nom</th>
                      <th>Création</th>
                      <th>Logo</th>
                      <th>Catégorie</th>
                      <th>Moyenne</th>
                      <th>Supprimer</th>
                    </tr>
                </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>