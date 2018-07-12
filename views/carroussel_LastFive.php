<?php
use BWB\Framework\mvc\controllers\TrucksController;

?>

<div class="row">
    <div class="col-xs-6"> 
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Les dernières arrivées</h2>
                        <p class="lead mb-0">Ils viennent de s'inscrire, va faire un tour sur leur page pour découvrir leur carte</p>
                    </div>
                </div>
        </section>
    </div>
       
       <div class="col-xs-6"><!-- Carroussel FT -->
        
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner" role="listbox">

                <?php

                    foreach ($lastFiveTrucks as $key => $truck) {

                        if($key === 0){

                        echo '<div class="carousel-item active">
                                <img class="d-block img-fluid imageMedium" src="http://'.$_SERVER['SERVER_NAME'].'/assets/img/trucks/'.$truck->getLogo().'" alt="First slide">
                            </div>';
                        }else{

                        echo '<div class="carousel-item">
                            <img class="d-block img-fluid imageMedium" src="./assets/img/trucks/'.$truck->getLogo().'" alt="First slide">
                        </div>';
                        }
                    }
                ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
            <div class="carousel-item">
            <img src="..." alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>...</h3>
                <p>...</p>
            </div>
         </div>
        </div>
     </div>
