<?php
include 'header.php';
?>

<div class="container">
    <!-- Div SR-ONLY id du FT -->
    <input class="sr-only" id="idTruck" value=<?= $id;?>>
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
                    giveMeTheStars($moyenne);
                ?>
            </div>
            <br>
            <div class="row">
                <button class="update btn btn-warning btn-sm" onclick="addFavoris(
                            <?php echo $user->username[0].",".$id; ?>)"><span class="fa fa-star"></span>ajouter aux favoris</button>
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
        <div class="col-sm-8">
            <ul>
                <?php foreach ($carte as $value){?>
                <li><?php echo $value->getNom(); ?></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <?php if(isset($user)){?>
        <div class="col-sm-4">
            <button type="button" class="update btn btn-warning btn-sm" data-toggle="modal" data-target="#order" data-uid="<?= $id;?>" data-productid=""><span class="fas fa-cart-arrow-down"></span><h6>Commander</h6></button>
        </div>
        <?php }else{?>
        <div class="col-sm-4">
            <button type="button" class="update btn btn-warning btn-sm" onclick="getSub()"><span class="fas fa-cart-arrow-down"></span><h6>Commander</h6></button>
            <p>veuillez vous connecter ou vous inscrire pour passer une commande</p>
        </div>
        <?php }?>
        <?php include 'orderModal.php';?>
    </div>   
    <hr>
    <div class="row">
        <h2>Planning</h2>
    </div>
    <?php include 'calendarStatique.php'; ?>
    <hr>
    <div class="row">     
        <h2>Les avis</h2>
    </div>
    <div class="panel-group">
            <div class="row">
                <div class="col-sm-10">
                    <?php 
                    foreach ($listeAvis as $avis){
                        if($avis !== ""){
                            ?><li><?php echo $avis; ?></li><?php
                        }
                    }
                    ?>
                </div>
                <div class="col-sm-2">
                    <?php 
                    foreach ($listeNote as $note){
                        if($note != 0){
                            ?><li><?php
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
                        }
                    }    
                    ?></li>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
                 
<?php
include 'footer.php';

function giveMeTheStars($note){
    $vides = floor(5 - $note);
    
    if((fmod($note,1) !== 0.0)){
        $middle = true;
        $pleines = 4 - $vides; 
    }else{
        $middle = false;
        $pleines = 5 - $vides; 
    }

    while($pleines > 0){
        echo '<i class="fas fa-star"  style="color:#DEDE4C"></i>';
        $pleines--;
    }

    if($middle){
        echo '<i class="fas fa-star-half-alt"  style="color:#DEDE4C"></i>';
    }

    while($vides > 0){
        echo '<i class="far fa-star"  style="color:#DEDE4C"></i>';
        $vides--;
    }

}
?>