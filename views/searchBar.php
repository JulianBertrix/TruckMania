<form action=<?="http://".$_SERVER['SERVER_NAME'] . "/search"?> role="form" method="post">
    <div class="form-row">
        <div class="col">
            <button type="button" class="btn btn-info"><i class="fas fa-map-marker-alt"></i></button>
        </div>
        <div class="col">
            <input type="text" id="location" name="location" class="form-control" placeholder="Où ?">
        </div>
        <div class="col">
            <input type="text" id="datePicker" name="dateRequest" class="form-control" placeholder="Quand ?">
        </div>
        <div class="col">
            <input type="text" name="heureRequest" class="form-control timepicker" placeholder="Heure ?">
        </div>
        <div class="col form-group">
            <select class="form-control" id="catRequest" name="catrequest">
            <option>Toutes les catégories</option>
                <?php
                    foreach ($listeCat as $cat) {
                        echo '<option>'.$cat->getIntitule().'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>