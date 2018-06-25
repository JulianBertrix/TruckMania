<?php
use \BWB\Framework\mvc\models\CategorieModel;
include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-xl-9 mx-auto">
        <?php
        include 'searchBar.php';
        ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h4>Liste des Food Trucks</h4>
        </div>
        <div class="col-6">
            <h4>Carte</h4>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>