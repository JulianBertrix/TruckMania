<?php
use \BWB\Framework\mvc\models\CategorieModel;
$faker = Faker\Factory::create();
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

  <div class="list">
      <?php for ($i = 0; $i < 30; $i++): ?>
        <div class="item js-marker" data-lat="<?= $faker->latitude(43, 44) ?>" data-lng="<?= $faker->longitude(2, 4) ?>" data-price="<?= $faker->numberBetween(0, 100) ?>">
          <img src="https://via.placeholder.com/400x260" alt="">
          <h4>3 barres de chocolat pour le prix de 2 !</h4>
          <p>
            Ici une petite description qui explique pourquoi c'est mieux ici
          </p>
        </div>
      <?php endfor; ?>
  </div>

  <div class="map" id="map"></div>

</div>
<script src=<?="http://".$_SERVER['SERVER_NAME'] . "/assets/scripts/airbnb_vendor.js"?>></script>
<script src=<?="http://".$_SERVER['SERVER_NAME'] . "/assets/scripts/airbnb_app.js"?>></script>
</body>
</html>