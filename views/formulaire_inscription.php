<?php 
	include 'header.php';
?>
<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action=<?="http://".$_SERVER['SERVER_NAME'] . "/inscription"?> role="form" method="post">
				<span class="contact100-form-title">
					INSCRIPTION
				</span>
				<div class="row">
  					<div class="col-6">
					<div class="wrap-input100 validate-input" data-validate="Ce champ est requis">
					<span class="label-input100">Votre Nom</span>
					<input class="input100" type="text" name="nom" placeholder="Nom" required>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Ce champ est requis">
					<span class="label-input100">Mot de passe</span>
					<input class="input100" type="password" name="mot_de_passe" placeholder="Mot de passe" required>
					<span class="focus-input100"></span>
				</div>
			</div>
				  
				<div class="col-6">
					<div class="wrap-input100 validate-input" data-validate="Ce champ est requis">
					<span class="label-input100">Votre Prénom</span>
					<input class="input100" type="text" name="prenom" placeholder="Prénom" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Ce champ est requis">
					<span class="label-input100">E-Mail</span>
					<input class="input100" type="text" name="email" placeholder="E-Mail" required oninvalid="this.setCustomValidity('Veuillez entrer une adresse valide')">
					<span class="focus-input100"></span>
				</div>
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
		</div>
			<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Envoyer
								<i class="fas fa-angle-right"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	include 'footer.php'
?>