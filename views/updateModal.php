<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Modifier mes infos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form class="contact100-form validate-form" action=<?="http://".$_SERVER['SERVER_NAME'] . "/profile"?> role="form" method="post">
            <span class="label-input100">Email</span>
            <input id="email" class="input100" type="text" name="email" value="<?php echo $infoClient->getEmail(); ?>">
            <span class="label-input100">Mot de passe</span>
            <input id="motDePasse" class="input100" type="password" name="mot_de_passe" value="Mot de passe">
            <span class="label-input100">Adresse</span>
            <input class="input100" type="text" name="user_input_autocomplete_address" value="<?php echo $infoClient->getAdresseId()->getAdresse(); ?>" id="user_input_autocomplete_address">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="updateInfo()">Valider</button>
      </div>
    </div>
  </div>
</div>