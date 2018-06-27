<?php
use BWB\Framework\mvc\models\AdresseModel;
include "header.php";
?>

<h1 style="padding-left: 30px;"><strong>Resultats</strong></h1>

<div class="containerListe">

  <div class="list">
      <?php 
      
      foreach ($listeAdress as $adress){ 
        
        ?>
        <div class="item js-marker" data-lat=<?= $adress->getLatitude();?> data-lng=<?= $adress->getLongitude();?> data-price="5">
          <img src="https://via.placeholder.com/400x260" alt="">
          <h4><?= $adress->getLatitude();?></h4>
          <h4><?= $adress->getLongitude();?></h4>
          <p>
          <?= $adress->getAdresse();?>
          </p>
        </div>
      <?php 
    }?>
  </div>

  <div class="map" id="map"></div>

</div>
<?php
include "footer.php";
?>