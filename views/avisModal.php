<!-- Modal -->
<div class="modal fade" id="avis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Laissez un avis</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" id="valider" class="btn btn-success" data-dismiss="modal" onclick="">Valider</button>
      </div>
    </div>
  </div>
</div>