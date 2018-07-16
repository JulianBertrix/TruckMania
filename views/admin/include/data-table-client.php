<!-- Example DataTables Card-->
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user"></i> Utilisateurs</div>
        <div class="card-body">
          <div class="table-responsive">
          <div class="container-fluid">
            <table id="" class="table table-striped table-bordered text-center hover" style="width:100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Mail</th>
                  <th>Création</th>
                  <th>Rôle</th>
                  <th>Adresse</th>
                  <th>Truck</th>
                </tr>
                </thead>
                  <tbody>
                  <?php 
                    use BWB\Framework\mvc\models\UtilisateurModel;
                      foreach ($listeUsers as $utilisateurs){
                    ?>
                    <tr>
                      <td><?php echo $utilisateurs->getId(); ?></td>
                      <td><?php echo $utilisateurs->getNom(); ?></td>
                      <td><?php echo $utilisateurs->getPrenom(); ?></td>
                      <td><?php echo $utilisateurs->getEmail(); ?></td>
                      <td><?php echo $utilisateurs->getDateCreation(); ?></td>
                      <td><?php echo $utilisateurs->getRoleId()->getNom(); ?></td>
                      <td><?php echo $utilisateurs->getAdresseId()->getAdresse(); ?></td>
                      <td><?php 
                        if($utilisateurs->getfoodTruckId() !== 0){
                          echo $utilisateurs->getfoodTruckId()->getNom(); 
                        }else{
                          echo "";
                        };
                        ?> 
                        </td>
                    </tr>
                  <?php 
                  }
                ?>
                  </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Mail</th>
                  <th>Création</th>
                  <th>Rôle</th>
                  <th>Adresse</th>
                  <th>Truck</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
   