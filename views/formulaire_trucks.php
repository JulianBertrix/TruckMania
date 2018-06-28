<?php 
	use \BWB\Framework\mvc\models\CategorieModel;
	include 'header.php';
?>
<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action=<?="http://".$_SERVER['SERVER_NAME'] . "/inscription"?> role="form" method="post">
				<span class="contact100-form-title">
					TRUCKS
				</span>
                <h5>Vos informations :</h5>
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
					<input class="input100" type="text" name="email" placeholder="E-Mail" required>
					<span class="focus-input100"></span>
				</div>
			</div>
			
		</div>
        <h5>Le truck :</h5>
        <div class="row">
        <div class="col-6">
			<div class="wrap-input100 validate-input" data-validate="Ce champ est requis">
					<span class="label-input100">Nom du truck</span>
					<input class="input100" type="text" placeholder="Nom du truck" required>
					<span class="focus-input100"></span>
				</div>
			</div>
            <div class="col-6">
			<div class="wrap-input100 validate-input" data-validate="Ce champ est requis">
					<span class="label-input100">N° Siret</span>
					<input class="input100" type="text" placeholder="632789540" required>
					<span class="focus-input100"></span>
				</div>
			</div>
            <!-- AUTOCOMPLETE -->
			<div class="col-6">
			<div class="wrap-input100 validate-input" data-validate="Ce champ est requis">
					<span class="label-input100">Adresse</span>
					<input class="input100" type="text" name="user_input_autocomplete_address" placeholder="Adresse" id="user_input_autocomplete_address" required>
					<span class="focus-input100"></span>
				</div>
			</div>
            <div class="col-6">
				<span class="label-input100">Catégories</span>
                <select class="form-control" id="catRequest" name="catrequest">
                
                    <?php
                        foreach ($listeCat as $cat) {
                            echo '<option>'.$cat->getIntitule().'</option>';
                        }
                    ?>
                </select>
                <span class="focus-input100"></span>
			</div>
			<!-- ./END AUTOCOMPLETE -->
            <div class="col-6">
            <div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Annuler
								<i class="fas fa-angle-right"></i>
							</span>
						</button>
					</div>
				</div>
                </div>
                <div class="col-6">
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
                    </div>
                </div>
                </form>
            </div>
        </div>
<?php
	include 'footer.php'
?>