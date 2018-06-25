<form>
    <div class="form-row">
        <div class="col">
            <button type="button" class="btn btn-info"><i class="fas fa-map-marker-alt"></i></button>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Où ?">
        </div>
        <div class="col">
            <input type="text" id="datePicker" class="form-control" placeholder="Quand ?">
        </div>
        <div class="col">
            <input type="text" class="form-control timepicker" placeholder="Heure ?">
        </div>
        
        <div class="col dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Catégorie
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <!-- Recup des categories -->
                <?php
                    foreach ($listeCat as $cat) {
                    echo '<a class="dropdown-item" href="#">'.$cat->getIntitule().'</a>';
                    }
                ?>
            </div>
        </div>
        <div class="col">
            <button type="button" class="btn btn-info"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>