<?php 
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\models\AdresseModel;
?>
<script src="profileClient.js"></script>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1>Mon Profile</h1></div>
            <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src=""></a></div>
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
              
            <ul class="list-group">
              <li class="list-group-item text-muted">Mes infos</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Nom</strong></span><?php echo $infoClient->getNom(); ?></li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Prenom</strong></span><?php echo  $infoClient->getPrenom(); ?></li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span><?php echo $infoClient->getEmail(); ?></li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Adresse</strong></span><?php echo $infoClient->getAdresseId()->getAdresse(); ?></li>
            </ul>
        <div class="container">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            edit
            </button>    
            </div><!--/col-3-->                
        <!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Edition du profile</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                <div class="modal-body">
                    <form class="contact100-form validate-form" action=<?="http://".$_SERVER['SERVER_NAME'] . "/profile"?> role="form" method="post">
				
                        <div class="wrap-input100 validate-input" data-validate="Ce champ est requis">
                                <span class="label-input100">Mot de passe</span>
                                <input class="input100" type="password" name="mot_de_passe" placeholder="Mot de passe" required>
                                <span class="focus-input100"></span>
                        </div>


                        <div class="wrap-input100 validate-input" data-validate = "Ce champ est requis">
                                <span class="label-input100">E-Mail</span>
                                <input class="input100" type="text" name="email" placeholder="E-Mail" required oninvalid="this.setCustomValidity('Veuillez entrer une adresse valide')">
                                <span class="focus-input100"></span>
                        </div>

			<!-- AUTOCOMPLETE -->
			<div class="col-12">
                            <div class="wrap-input100 validate-input" data-validate="Ce champ est requis">
                                <span class="label-input100">Adresse</span>
                                <input class="input100" type="text" name="user_input_autocomplete_address" placeholder="Adresse" id="user_input_autocomplete_address" required>
                                <span class="focus-input100"></span>
                            </div>
			</div>
			<!-- ./END AUTOCOMPLETE -->
	

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

  





