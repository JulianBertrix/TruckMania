<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modifier mes infos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="contact100-form validate-form" action=<?="http://".$_SERVER['SERVER_NAME'] . "/profile"?> role="form" method="post">
            <span class="label-input100">Email</span>
            <input class="input100" type="text" name="email" placeholder="E-Mail">
            <span class="label-input100">Mot de passe</span>
            <input class="input100" type="password" name="mot_de_passe" placeholder="Mot de passe">
            <span class="label-input100">Adresse</span>
					<input class="input100" type="text" name="user_input_autocomplete_address" placeholder="Adresse" id="user_input_autocomplete_address">
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

