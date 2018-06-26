<?php
?><!DOCTYPE html>
<html>
<head>
  <title>Title</title>
  <link rel="stylesheet" href=<?="http://".$_SERVER['SERVER_NAME'] . "/assets/css/search_page.css"?>>
</head>
<body>

<h1 style="padding-left: 30px;">Où acheter le meilleur <strong>chocopain</strong></h1>

<div class="container">

  <div class="list">
      <?php for ($i = 0; $i < 10; $i++): ?>
        <div class="item js-marker" data-lat="ttt" data-lng="ttt" data-price="5">
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