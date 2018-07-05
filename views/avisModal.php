<!-- Modal Header -->
<div class="modal-header">
        <h4 class="modal-title">laissez un avis</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<!-- Modal -->
<div class="modal fade" id="avis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Modifier mes infos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       <!-- Modal body -->
       <div class="modal-body">
        <form class="contact100-form validate-form" action=<?="http://".$_SERVER['SERVER_NAME'] . "/foodtruck/".$foodtruckId ?> role="form" method="post">
            <span class="label-input100"><h3>Note</h3></span><br>
            <div id="note" class="rating rating2">
                <a href="#5" value="5">★</a><a href="#4" value="4">★</a><a href="#3" value="3">★</a><a href="#2" value="2">★</a><a href="#1" value="1">★</a>
            </div>
            <span class="label-input100"><h3>Message</h3></span><br>
            <input id="message" class="input100" type="text" name="message" placeholder="Message">
        </form>
      </div>
           <!-- Modal footer -->
           <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addAvis(<?php 
            echo $numeroCommande;
            echo $truck->getFoodtruckId()->getId();
          ?>)">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
