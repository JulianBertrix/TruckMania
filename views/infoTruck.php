<br><br><ul class="list-group">
  <li class="list-group-item text-center"><strong>Infos FoodTruck</strong></li>
  <li class="list-group-item text-right"><span class="pull-left"><strong>Nom</strong></span><?php echo $infosTruck['nom']; ?></li>
  <li class="list-group-item text-right"><span class="pull-left"><strong>SIRET</strong></span><?php echo  $infosTruck['siret']; ?></li>
  <li class="list-group-item text-right mail"><span class="pull-left"><strong>Logo<br></strong></span><img src=<?php echo  $infosTruck['logoChemin']; ?> alt="image logo" class="img-thumbnail"></li>
  <li class="list-group-item text-right"><span class="pull-left"><strong>Categorie</strong></span><?php echo $infosTruck['catIntitule']; ?></li>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modifInfosTruck">
    Edit
  </button>
</ul>
<br>
<ul class="list-group">
  <li class="list-group-item text-center"><strong>Statistiques</strong></li>
  <li class="list-group-item text-right"><span class="pull-left"><strong>Nombre de favoris</strong></span><?php echo $nbFavoris; ?></li>
  <li class="list-group-item text-right"><span class="pull-left"><strong>Note moyenne avis</strong></span><?php echo  giveMeTheStars($infosTruck['moyenne']); ?></li>
</ul>
<!-- Modal -->
<div class="modal fade" id="modifInfosTruck" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Modifier mes infos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
            <span class="label-input100">Email</span>
            <input id="nomModif" class="input100" type="text" name="nom" value="<?php echo $infosTruck['nom']; ?>">
            <span class="label-input100">SIRET</span>
            <input id="siretModif" class="input100" type="text" name="siret" value="<?php echo $infosTruck['siret']; ?>">
            <span class="label-input100">Nom fichier logo</span>
            <input  id="logoModif" class="input100" type="text" name="logo" value="<?php echo $infosTruck['logo']; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" onclick="updateTruck(<?php echo $infosTruck['id']; ?>);">Valider</button>
      </div>
    </div>
  </div>
</div>
<br><br>
<br><br> 