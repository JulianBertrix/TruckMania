<!-- Modal -->
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- HEADER -->
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Votre Commande</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
              <span class="label-input100"><h4>Jour</h4></span>
              <input type="text" id="datePicker" name="dateRequest" class="form-control" placeholder="Quel jour ?" required="required">
          </div>
          <div class="col-sm-6">
              <span class="label-input100"><h4>Heure</h4></span>
              <input type="text" id="heure" name="heureRequest" class="form-control timepicker" placeholder="Quelle heure ?" required="required">
          </div>
        </div>
        <span class="label-input100"><h4>Plat</h4></span>
        <div class="row">
          <table class="table table-hover table-sm text-center">
            <tbody>
              <?php foreach($carte as $key => $value){?>
              <tr>
                <td style="vertical-align:middle"><img class="imageXs" src=<?= "http://".$_SERVER['SERVER_NAME'] . "/assets/img/plats/".$value->getImage(); ?> alt="image"></td>
                <td style="vertical-align:middle"><h6><?=$value->getNom();?></h6></td>
                <td style="vertical-align:middle" id="prix<?php echo $key; ?>"><h6><?=$value->getPrix();?> €</h6></td>
                <td style="vertical-align:middle"><select class="form-control" id="quantite<?php echo $key; ?>" name="quantite" onchange="getTotal(<?php echo count($carte); ?>)">
                    <option value="0">Quantité</option>
                    <?php 
                    $i = 1;
                    for($i = 1; $i <= 10; $i++) {?>
                    <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                    <?php }?>
                  </select></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <span class="label-input100"><h4>Total</h4></span>
        <div id="total">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" id="valider" class="btn btn-success" onclick="Commander(<?php echo $user->username[0].",".$id.",".count($carte); ?>)">Confirmer</button>
      </div>
    </div>
  </div>
</div>
