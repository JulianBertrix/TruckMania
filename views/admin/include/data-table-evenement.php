 <!-- Example DataTables Card-->
 <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-truck"></i> Evénements</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="container-fluid">
              <table id="" class="table table-striped table-bordered text-center" style="width:100%">
                <thead>
                    <tr>
                      <th>Id</th>
                      <th>Création</th>
                      <th>Intitulé</th>
                      <th>Début</th>
                      <th>Fin</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Utilisateur</th>
                      <th>Adresse</th>
                      <th>Participant</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                   use BWB\Framework\mvc\models\EvenementModel;
                    foreach ($listeEvenement as $evenements){
                    ?>
                    <tr>
                      <td><?php echo $evenements->getId(); ?></td>
                      <td><?php echo $evenements->getdate_creation(); ?></td>
                      <td><?php echo $evenements->getIntitule(); ?></td>
                      <td><?php echo $evenements->getdate_debut(); ?></td>
                      <td><?php echo $evenements->getdate_fin(); ?></td>
                      <td><?php echo $evenements->getDescription(); ?></td>
                      <td><?php echo $evenements->getimage(); ?></td>
                      <td><?php echo $evenements->getUtilisateur_Id()->getNom(); ?></td>
                      <td><?php echo $evenements->getAdresse_Id()->getAdresse(); ?></td>
                      <td><?php echo $evenements->getNombreDeParticipant(); ?></td>
                    </tr>
                  <?php }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Création</th>
                      <th>Intitulé</th>
                      <th>Début</th>
                      <th>Fin</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Utilisateur</th>
                      <th>Adresse</th>
                      <th>Participant</th>
                    </tr>
                </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>

