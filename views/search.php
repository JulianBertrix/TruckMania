<?php
use BWB\Framework\mvc\models\PlanningModel;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\models\AdresseModel;
include "header.php";
?>
<br>
<div class="container">
<?php
include "searchBar.php";

//Affichage message d'erreur si besoin
if($message !== "OK"){
?>

  <div id="afficheMessage">

<?php
$reponse = "Pas de résultats ";
  switch($message){
    case "Pas la cat":
    echo "<h4>".$reponse."pour cette catégorie. Résultats pour les autres catégories</h4>";
    break;
    case "Pas dans zone":
    echo "<h4>".$reponse." autour de cette adresse</h4>";
    break;
    case "Pas dans date":
    echo "<h4>".$reponse." pour cette date et/ou cette heure</h4>";
    break;
  }
?>
  </div>
<?php
}
?>

</div>
<h3 style="padding-left: 30px;"><strong>Resultats</strong></h3>

<div class="containerListe">

  <div class="list">
      <?php 
      
      foreach ($request as $planning){

        $objetTruck = $planning->getFoodtruckId();
        $objetAdresse = $planning->getAdresseId();
       
        ?>
        <div class="item js-marker" data-lat=<?= $objetAdresse->getLatitude();?> data-lng=<?= $objetAdresse->getLongitude();?> data-price=<?=$objetTruck->getMoyenne()?>>
          <div class="imgLogo">
          <a <?php echo "href=http://".$_SERVER['SERVER_NAME'] ."/foodtruck/".$objetTruck->getId(); ?>>
            <img src=<?="http://".$_SERVER['SERVER_NAME']."/assets/img/trucks/".$objetTruck->getLogo()?> alt="">
            </a>
          </div>
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
