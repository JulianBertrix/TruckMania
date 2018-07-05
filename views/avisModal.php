<!-- The Modal -->
<div class="modal" id="avis">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">laissez un avis</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="contact100-form validate-form" action=<?="http://".$_SERVER['SERVER_NAME'] . "/profile" ?> role="form" method="post">
            <span class="label-input100"><h3>Message</h3></span><br>
            <input id="message" class="input100" type="text" name="message" placeholder="Message"><br>
            <span class="label-input100"><h3>Note</h3></span>
            <select class="form-control" id="note" name="note">
                <option>Sectionner une note</option>
                <option id="note" value="0.5">0.5</option>
                <option id="note" value="1.0">1.0</option>
                <option id="note" value="1.5">1.5</option>
                <option id="note" value="2.0">2.0</option>
                <option id="note" value="2.5">2.5</option>
                <option id="note" value="3.0">3.0</option>
                <option id="note" value="3.5">3.5</option>
                <option id="note" value="4.0">4.0</option>
                <option id="note" value="4.5">4.5</option>
                <option id="note" value="5.0">5.0</option>
            </select>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <button id="valider" type="button" class="btn btn-success" data-dismiss="modal" onclick="">Valider</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
