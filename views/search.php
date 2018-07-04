<?php
use BWB\Framework\mvc\models\PlanningModel;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\models\AdresseModel;
include "header.php";
include "searchBar.php";
?>

<h1 style="padding-left: 30px;"><strong>Resultats</strong></h1>

<div class="containerListe">

  <div class="list">
      <?php 
      
      foreach ($request as $planning){

        $objetTruck = $planning->getFoodtruckId();
        $objetAdresse = $planning->getAdresseId();
       
        ?>
        <div class="item js-marker" data-lat=<?= $objetAdresse->getLatitude();?> data-lng=<?= $objetAdresse->getLongitude();?> data-price=<?=$objetTruck->getMoyenne()?>>
          <img src=<?="http://".$_SERVER['SERVER_NAME']."/assets/img/trucks/".$objetTruck->getLogo()?> alt="">
          <h4><?=$objetTruck->getNom()?></h4>
          <h5><?=$objetTruck->getMoyenne()?></h5>
          <h5><?=$objetTruck->getCategorieId()->getIntitule()?></h5>
          <p>
          
          </p>
        </div>
      <?php }?>
  </div>

  <div class="map" id="map"></div>

</div>
<?php
include "footer.php";
?>
