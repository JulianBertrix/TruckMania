<?php include 'header.php';
//var_dump($event);

?>
<br>
<div class="container">
    <!-- Image Evt + Titre-->
    <div class= "fond" style="background: url('http://<?=$_SERVER['SERVER_NAME']?>/assets/img/evenements/<?=$event['image']?>')">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"><?= $event['title']?></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <br>
    <div class="col">
        <button type="button" id= "buttParticiper" class="btn btn-success btn-lg float-right">Participer</button>
    </div>
    <br>
</div>
<div class="container">
    <br>
    <br>
    <!-- Infos -->
    <div class="colEnligne">
        <br>
        <h3>Infos</h3>
        <br>
        <div class="row text-center">
            <div class="col-5 offset-1">
                <h4><b>Début: </b><?= date_format(date_create_from_format('Y-m-d H:i:s', $event['start']), 'd/m/Y H:i')?></h4>
            </div>
            <div class="col-5">
                <h4><b>Fin: </b> <?= date_format(date_create_from_format('Y-m-d H:i:s', $event['end']), 'd/m/Y H:i')?></h4>
            </div>
        </div>
        <br>
        <div class="row text-center">
            <div class="col-6 offset-3">
                <h4>Nombre de participants: <?= $event['NombreDeParticipant']?></h4>
            </div>
        </div>
        <br>
    </div>
    <br>
    <br>
    <!-- Adresse -->
    <div class="colEnligne">
        <br>
        <h3>Lieu</h3>
        <br>
        <div class="row text-left">
            <div class="col-6 offset-1">
                <h4>Adresse: <?=$event['adresse']['adresse']?></h4>
            </div>
        </div>
        <br>
        <div class="row">   
            <div class="col-6 offset-3">
                <!-- Map -->
                <img class="img-fluid imageMapFull" src="https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=600x600&maptype=roadmap
&markers=color:red%7Clabel:C%7C<?=$event['adresse']['latitude']?>,<?=$event['adresse']['longitude']?>&key=AIzaSyDd0z6MCPdZ0v5TPvkbB6yWW9dli2vkN3c" alt="Card image cap">
            </div>
        </div>
        <br>
    </div>
    <br>
    <br>
    <!-- Participants -->
    <div class="colEnligne">
        <br>
        <h3>Trucks</h3>
        <br>
        <div class="container">
            <div class="row">
                    <?php
                    foreach ($listeFT as $truck){?>
                        <div class="card cardPlats" style="width: 15rem;">
                            <img class="card-img-top imageCardXl" src=<?= "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$truck['logo']; ?> alt="Card image cap">
                            <div class="card-body">
                                <input type="text" class="input100" value="<?=$truck['nom'];?>">
                            </div>
                        </div>

                        <?php
                    }
                        ?>
            </div>
        </div>
        <br>
    </div>
    <br>
    <br>
</div>
<br>
<?php
include 'footer.php';




