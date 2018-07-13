<?php include 'header.php';
//var_dump($event);

?>
<br>
<div class="container">
    <div class="row">
        <!-- Image Evt -->
        <div class="col-4">
            <img class="img-fluid imageBig" src="http://<?=$_SERVER['SERVER_NAME']?>/assets/img/evenements/<?=$event['image']?>" alt="Image Event">
        </div>
        <!-- Infos -->
        <div class="col-6">
            <div class="row">
                <h1><?= $event['title']?></h1>
            </div>
            <div class="row">
                <h4>Du <?= date_format(date_create_from_format('Y-m-d H:i:s', $event['start']), 'd/m/Y H:i')?></h4>
            </div>
            <div class="row">
                <h4>Au <?= date_format(date_create_from_format('Y-m-d H:i:s', $event['end']), 'd/m/Y H:i')?></h4>
            </div>
            <br>
            <div class="row">
                <h5>Nombre de participants: <?= $event['NombreDeParticipant']?></h5>
            </div>
            <br>
            <div class="row">
                <h5>Adresse: <?=$event['adresse']['adresse']?></h5>
            </div>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary btn-lg">Participer</button>
        </div>  
    </div>
    <br>
    <br>
    <div class="row">   
            <div class="col offset-2">
                <!-- Map -->
                <img class="img-fluid" src="https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=600x600&maptype=roadmap
&markers=color:red%7Clabel:C%7C<?=$event['adresse']['latitude']?>,<?=$event['adresse']['longitude']?>&key=AIzaSyDd0z6MCPdZ0v5TPvkbB6yWW9dli2vkN3c" alt="Card image cap">
            </div>
    </div>
</div>
<br>
<br>
<?php
include 'footer.php';




