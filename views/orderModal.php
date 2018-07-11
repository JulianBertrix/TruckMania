<!-- Modal -->
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Votre Commande</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class="contact100-form validate-form" role="form" method="post">
                <div class="col-sm-6">
                    <span class="label-input100"><h3>Jour</h3></span>
                    <input type="text" id="datePicker" name="dateRequest" class="form-control" placeholder="Quel jour ?" required="required">
                </div>
                <div class="col-sm-6">
                    <span class="label-input100"><h3>Heure</h3></span>
                    <input type="text" id="heure" name="heureRequest" class="form-control timepicker" placeholder="Quelle heure ?" required="required">
                </div>
                <span class="label-input100"><h3>Plat</h3></span>
                <div class="row">
                     
                    <?php foreach($carte as $key => $value){?>
                    <div class="col-sm-4">
                        <div id="plat<?php echo $key; ?>"><?php echo $value->getNom(); ?></div>
                        <div id="prix<?php echo $key; ?>" class="col-sm-2"><?php echo $value->getPrix(); ?></div>
                        <select class="form-control" id="quantite<?php echo $key; ?>" name="quantite" onchange="getTotal(<?php echo count($carte); ?>)">
                            <option value="0">Quantité</option>
                            <?php 
                            $i = 1;
                            for($i = 1; $i <= 10; $i++) {?>
                            <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <?php }?>                   
                </div>
                <span class="label-input100"><h3>Total</h3></span>
                <div id="total">
                
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" id="valider" class="btn btn-success" onclick="Commander(<?php echo $user->username[0].",".$id.",".count($carte); ?>)">Confirmer</button>
      </div>
    </div>
  </div>
</div>
