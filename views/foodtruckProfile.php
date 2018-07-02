<?php
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-2">            
            <img src="<?php echo "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$logo; ?>">            
        </div>
        <div class="col-sm-4" style="margin-left: 15px;">
            <h1>
                <?php echo $nom; ?>
            </h1>
            <h4>categorie</h4>
            <p><?php echo $categorie; ?></p>
        </div>
        <div class="col-sm-5">
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>A savoir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>loren ipsum</td>
                        </tr>
                    </tbody>
                </table>
                <button class="update btn btn-warning btn-sm" onclick="addFavoris(
                            <?php echo $id; ?>)"><span class="fa fa-star"></span>ajouter aux favoris</button>
            </div>
        </div>
        <div class="col-sm-12">
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
            ?><span class="fa fa-star"></span><span class="fa fa-star-half"></span><?php
        }
        if($moyenne == 2.5){
            ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half"></span><?php
        }
        if($moyenne == 3.5){
            ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half"></span><?php
        }
        if($moyenne == 4.5){
            ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half"></span><?php
        }
        ?>
        </div>
        <div class="col-sm-12">

            <h2>A propos</h2>
            <hr>

            <div id="description">
                <p>loren ipsum</p><br>
            </div>

            <h2>La carte</h2>
            <hr>
            <div class="panel-group">
                <?php foreach ($carte as $value){
                ?><li><?php echo $value; ?></li><?php
                }?>
            </div>

            <br><br>
            <h2 id="fullplanning">Planning</h2>
            <hr>
            <div id="calendar"></div>
            <div class="clear"></div>
            <hr>
            
            <h2>Les avis</h2>
            <hr>
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
                                ?><span class="fa fa-star-half"></span><?php
                            }
                            if($note == 1.5){
                                ?><span class="fa fa-star"></span><span class="fa fa-star-half"></span><?php
                            }
                            if($note == 2.5){
                                ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half"></span><?php
                            }
                            if($note == 3.5){
                                ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half"></span><?php
                            }
                            if($note == 4.5){
                                ?><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half"></span><?php
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