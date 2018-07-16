<?php include 'header.php';
?>
<br>
<div class="container">
    
    <?php
    foreach($listEvents as $event){
    ?>
    <div class= "fond" style="background: url('http://<?=$_SERVER['SERVER_NAME']?>/assets/img/evenements/<?=$event['event']['image']?>')">
        <a class="jumbotronSmall jumbotron-fluid" href="http://<?=$_SERVER['SERVER_NAME'] .'/evenement/'.$event['event']['id']?>">
            <div class="container">
                <h1 class="display-4"><?= $event['event']['title']?></h1>
                <br>
                <br>
                <div class="d-flex justify-content-around">
                    <div class="p-2">
                        Du <?= date_format(date_create_from_format('Y-m-d H:i:s', $event['event']['start']), 'd/m/Y H:i')?> au <?= date_format(date_create_from_format('Y-m-d H:i:s', $event['event']['end']), 'd/m/Y H:i')?>
                    </div>
                    <div class="p-2">
                        <?= $event['event']['NombreDeParticipant']?> participants
                    </div>
                    <div class="p-2">
                        <?php
                            if($event['nbFT'] === 0 || $event['nbFT'] === 1){
                                echo $event['nbFT']." FoodTruck";
                            }else{
                                echo $event['nbFT']." FoodTrucks";
                            }
                        ?>
                    </div>
                </div>
            </div>
                        </a>
    </div>
    <br>
    <?php
    }
    ?>
</div>

<br>
<?php
include 'footer.php';
?>