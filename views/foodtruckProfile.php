<?php
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-3">            
            <img src="<?php echo "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$logo; ?>">            
        </div>
        <div class="col-9">
            <div class="row">
                <h1><?php echo $nom; ?></h1>
            </div>
            <div class="row">
                <h3><?php echo $categorie; ?></h3>
            </div>
            <br>
            <div class="row">
                <?php
                    if($moyenne == 1.0){
                        ?><span class="fa fa-star"></span><?php
                    }
                    if($moyenne == 2.0){
                        ?><span class="fa fa-star"></span><span class="fa fa-star"></span><?php
                    }
                    if($moyenne == 3.0){
                        ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><?php
                    }
                    if($moyenne == 4.0){
                        ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><?php
                    }
                    if($moyenne == 5.0){
                        ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><?php
                    }
                    if($moyenne == 0.5){
                        ?><span class="fa fa-star-half"></span><?php
                    }
                    if($moyenne == 1.5){
                        ?><span class="fa fa-star"></span><span class="fas fa-star-half-alt"></span><?php
                    }
                    if($moyenne == 2.5){
                        ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fas fa-star-half-alt"></span><?php
                    }
                    if($moyenne == 3.5){
                        ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fas fa-star-half-alt"></span><?php
                    }
                    if($moyenne == 4.5){
                        ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fas fa-star-half-alt"></span><?php
                    }
                ?>
            </div>
            <br>
            <div class="row">
                <button class="update btn btn-warning btn-sm" onclick="addFavoris(
                            <?php echo $id; ?>)"><span class="fa fa-star"></span>ajouter aux favoris</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h3>A savoir</h3>             
    </div>
    <hr>
    <div class="row">
        <h3>La carte</h3>             
    </div>

    <div class="row">
        <ul>
            <?php foreach ($carte as $value){?>
            <li><?php echo $value; ?></li>
            <?php
            }
            ?>
        </ul>
    </div>   
    <hr>
    <div class="row">
        <h2>Planning</h2>
    </div>
    <?php include 'calendar.php'; ?>
    <hr>
    <div class="row">     
        <h2>Les avis</h2>
    </div>
    <div class="panel-group">
            <div class="row">
                <div class="col-sm-10">
                    <?php foreach ($listeAvis as $avis){
                        ?><li><?php echo $avis; ?></li><?php
                    }?>
                </div>
                <div class="col-sm-2">
                    <?php foreach ($listeNote as $note){
                        if($note == 1.0){
                            ?><span class="fa fa-star"></span><?php
                        }
                        if($note == 2.0){
                            ?><span class="fa fa-star"></span><span class="fa fa-star"></span><?php
                        }
                        if($note == 3.0){
                            ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><?php
                        }
                        if($note == 4.0){
                            ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><?php
                        }
                        if($note == 5.0){
                            ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><?php
                        }
                        if($note == 0.5){
                            ?><span class="fas fa-star-half-alt"></span><?php
                        }
                        if($note == 1.5){
                            ?><span class="fa fa-star"></span><span class="fas fa-star-half-alt"></span><?php
                        }
                        if($note == 2.5){
                            ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half"></span><?php
                        }
                        if($note == 3.5){
                            ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fas fa-star-half-alt"></span><?php
                        }
                        if($note == 4.5){
                            ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fas fa-star-half-alt"></span><?php
                        }
                        //echo $note;
                    }?>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
                 
<?php
include 'footer.php';
?>