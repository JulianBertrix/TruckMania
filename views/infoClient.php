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
            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">edit</button>    
        </div><!--/col-3-->                
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Recipient:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Send message</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

