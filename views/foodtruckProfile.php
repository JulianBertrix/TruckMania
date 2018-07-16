<?php
include 'header.php';
?>
<br>
<div class="container">
    <!-- Div SR-ONLY id du FT -->
    <input class="sr-only" id="idTruck" value=<?= $id;?>>
    <div class="row">
        <div class="col-3">            
            <img class="imageMedium200" src="<?php echo "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$logo; ?>">            
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
                <?php 
                if (isset($user->username[0])){
                    $addBtn = true;
                    foreach ($favoris as $utilisateur){
                        if ($user->username[0] === $utilisateur->getUtilisateurId()->getId()){
                            $addBtn = false;
                            break;
                        }
                    }
                    if($addBtn){
                        ?><button class="update btn btn-warning btn-sm" onclick="addFavoris(
                                <?php echo $user->username[0].",".$id; ?>)"><span class="fa fa-star"></span>Ajouter aux favoris</button><?php
                    }
                    else{
                        ?><button class="update btn btn-warning btn-sm" onclick="deleteFavoris(
                                <?php echo $user->username[0].",".$id; ?>)"><span class="fa fa-star"></span>Retirer des favoris</button><?php
                    }
                }
                else{
                    ?><button class="update btn btn-warning btn-sm" onclick="getSub()"><span class="fa fa-star"></span>Ajouter aux favoris</button><?php
                }
                ?>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="row">
        <h3>La carte</h3>
    </div>
    <div class="row">
        <?php if(isset($user)){?>
            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#order" data-uid="<?= $id;?>" data-productid=""><span class="fas fa-cart-arrow-down"></span><h6>Commander</h6></button>
        <?php }else{?>
            <button type="button" class="btn btn-outline-warning btn-sm" onclick="getSub()"><i class="fas fa-edit"></i><h6>S'inscrire</h6></button>
        <?php }?>
    </div>
                     
    <div class="row">
        <?php foreach ($carte as $value){?>
            <div class="card" style="width: 10rem;">
                <img class="card-img-top imageCardSm" src=<?= "http://".$_SERVER['SERVER_NAME'] . "/assets/img/plats/".$value->getImage(); ?> alt="Card image cap">
                <div class="card-body">
                    <input type="text" class="" value="<?=$value->getNom();?>">
                    <input type="text" class="" value="<?=$value->getPrix();?> €">
                </div>
            </div>
            <?php
            }
            ?>
    </div>
        
    <?php include 'orderModal.php';?>
  
    <hr>
    <div class="row">
        <h2>Planning</h2>
    </div>
    <?php include 'calendarStatique.php'; ?>
    <hr>
    <div class="row">     
        <h2>Les avis</h2>
    </div>
        <?php 
        foreach ($listeAvis as $avis){
            if($avis['message'] !== ""){?>
                <div class="row">
                    <div class="col-sm-10"><?php echo $avis['message']; ?></div>
                    <div class="col-sm-2"><?php giveMeTheStars($avis['note']);?></div>
                </div>
                <br>
        <?php
            }
        }
        ?>
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