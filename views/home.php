<?php
use \BWB\Framework\mvc\models\CategorieModel;
include 'header.php';
?>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Trouvez votre Food Truck</h1>
          </div>
          <div class="mx-auto">
<?php
  include 'searchBar.php';
?>
          </div>
        </div>
      </div>
    </header>

<?php
include 'home_Presentation.php';
//include 'carroussel_LastFive.php';
?>
<br>

 <div class="container">
    <div class="row">
      <!-- CAROUSEL lastFiveFoodTrucks-->
        <div class="col-2 partGauche">
          <h3><i>Les derniers food-trucks arrivés !</i></h3>
        </div>
        <div class="col-4">

          <div id="lastFiveCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#lastFiveCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#lastFiveCarousel" data-slide-to="1"></li>
              <li data-target="#lastFiveCarousel" data-slide-to="2"></li>
              <li data-target="#lastFiveCarousel" data-slide-to="3"></li>
              <li data-target="#lastFiveCarousel" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <?php

              foreach ($lastFiveTrucks as $key => $truck) {

                  if($key === 0){

                  echo '<div class="carousel-item active" >
                          <a href=http://'.$_SERVER['SERVER_NAME'] .'/foodtruck/'.$truck->getId().'>
                            <img class="d-block img-fluid imageCardXl" src="http://'.$_SERVER['SERVER_NAME'] .'/assets/img/trucks/'.$truck->getLogo().'" alt="First slide">
                          </a>
                          <h6>'.$truck->getNom().'</h6>
                        </div>';
                  }else{

                  echo '<div class="carousel-item style="text-align: center;">
                          <a href=http://'.$_SERVER['SERVER_NAME'] .'/foodtruck/'.$truck->getId().'>
                            <img class="d-block img-fluid imageCardXl" src="http://'.$_SERVER['SERVER_NAME'] .'/assets/img/trucks/'.$truck->getLogo().'" alt="First slide">
                          </a>
                          <h6>'.$truck->getNom().'</h6>
                        </div>';
                  }
              }
              ?>
            </div>
            <a class="carousel-control-prev" href="#lastFiveCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#lastFiveCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
      </div>
      <!-- CAROUSEL lastFiveEvts-->
      <div class="col-2 partGauche">
          <h3><i>Les futurs évenements !</i></h3>
        </div>
        <div class="col-4">

          <div id="lastFiveEvts" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#lastFiveEvts" data-slide-to="0" class="active"></li>
              <li data-target="#lastFiveEvts" data-slide-to="1"></li>
              <li data-target="#lastFiveEvts" data-slide-to="2"></li>
              <li data-target="#lastFiveEvts" data-slide-to="3"></li>
              <li data-target="#lastFiveEvts" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <?php
              foreach ($lastFiveEvts as $key => $event) {

                  if($key === 0){

                  echo '<div class="carousel-item active" >
                          <a href=http://'.$_SERVER['SERVER_NAME'] .'/evenement/'.$event->getId().'>
                            <img class="d-block img-fluid imageCardXl" src="http://'.$_SERVER['SERVER_NAME'] .'/assets/img/evenements/'.$event->getImage().'" alt="First slide">
                          </a>
                            <h6>'.$event->getIntitule().'</h6>
                      </div>';
                  }else{

                  echo '<div class="carousel-item">
                      <a href=http://'.$_SERVER['SERVER_NAME'] .'/evenement/'.$event->getId().'>
                          <img class="d-block img-fluid imageCardXl" src="http://'.$_SERVER['SERVER_NAME'] .'/assets/img/evenements/'.$event->getImage().'" alt="First slide">
                      </a>
                      <h6>'.$event->getIntitule().'</h6>
                  </div>';
                  }
              }
              ?>
            </div>
            <a class="carousel-control-prev" href="#lastFiveEvts" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#lastFiveEvts" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
      </div>
    </div>
  </div>
<br><br>
<?php
include 'footer.php';
?>