<form action=<?="http://".$_SERVER['SERVER_NAME'] . "/search"?> role="form" method="post">
    <div class="form-row">
        <div class="col-1">
            <button type="button" class="btn btn-info" onclick="localizeMe();"><i class="fas fa-map-marker-alt"></i></button>
        </div>
        <div class="col-4">
            <input class="form-control" type="text" name="user_input_autocomplete_address" placeholder="Où ?" id="user_input_autocomplete_address" size="235">
        </div>
        
        <div class="col-2">
            <input type="text" id="datePicker" name="dateRequest" class="form-control" placeholder="Quand ?">
        </div>
        <div class="col-1">
            <input type="text" name="heureRequest" class="form-control timepicker" placeholder="Heure ?">
        </div>
        <div class="col-3 form-group">
            <select class="form-control" id="catRequest" name="catrequest">
            <option>Toutes les catégories</option>
                <?php
                    foreach ($listeCat as $cat) {
                        echo '<option>'.$cat->getIntitule().'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-1">
            <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>