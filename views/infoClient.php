<br><br><ul class="list-group">
  <li class="list-group-item text-center"><strong>MON PROFIL</strong></li>
  <li class="list-group-item text-right"><span class="pull-left"><strong>Nom</strong></span><?php echo $infoClient->getNom(); ?></li>
  <li class="list-group-item text-right"><span class="pull-left"><strong>Prenom</strong></span><?php echo  $infoClient->getPrenom(); ?></li>
  <li class="list-group-item text-right mail"><span class="pull-left"><strong>Email<br></strong></span><?php echo $infoClient->getEmail(); ?></li>
  <li class="list-group-item text-right"><span class="pull-left"><strong>Adresse</strong></span><?php echo $infoClient->getAdresseId()->getAdresse(); ?></li>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  <i class="fas fa-user-edit"></i> Editer
  </button>
</ul>
<div>
   <?php include 'updateModal.php'; ?>   
</div>
<br><br>
<br><br> 