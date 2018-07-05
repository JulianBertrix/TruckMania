<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="./favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trucks Mania</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--===============================================================================================-->
    <!-- DATA TABLE -->
    <link href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    <link href="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link href=<?="http://".$_SERVER['SERVER_NAME'] . "/assets/scripts/data_table.js"?>>
    <!--===============================================================================================-->

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href=<?="http://".$_SERVER['SERVER_NAME'] . "/vendor/bootstrap/css/bootstrap.min.css"?> rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Custom fonts for this template -->
    <link href=<?="http://".$_SERVER['SERVER_NAME'] . "/vendor/font-awesome/css/font-awesome.min.css"?> rel="stylesheet" type="text/css">
    <link href=<?="http://".$_SERVER['SERVER_NAME'] . "/vendor/simple-line-icons/css/simple-line-icons.css"?> rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href=<?="http://".$_SERVER['SERVER_NAME'] . "/assets/css/landing-page.min.css"?> rel="stylesheet">

    <!-- CSS Custom DatePicker -->
    <link href=<?="http://".$_SERVER['SERVER_NAME'] . "/assets/datePicker/jquery-ui.css"?> rel="stylesheet">

    <!-- CSS TimePicker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <!-- CSS SearchPage -->
    <link rel="stylesheet" href=<?="http://".$_SERVER['SERVER_NAME'] . "/assets/css/search_page.css"?>>
    
    <!--===============================================================================================-->
    <!-- CSS FORMULAIRE INSCRIPTION -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" type="text/css" href=<?="http://".$_SERVER['SERVER_NAME'] . "/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css"?>>
    <link rel="stylesheet" type="text/css" href=<?="http://".$_SERVER['SERVER_NAME'] . "/assets/css/formulaire.css"?>>
    <!--===============================================================================================-->

    <!-- FullCalendar -->
    <link rel='stylesheet' href=<?="http://".$_SERVER['SERVER_NAME'] . "/assets/css/fullcalendar.css"?>>

</head>
  <body>

    <!-- Navigation -->
   
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href=<?="http://".$_SERVER['SERVER_NAME'] . "/"?>>Trucks Mania</a>
        <?php
        //Profil
        if(isset($user)){
          echo '<a class="" href="http://'.$_SERVER['SERVER_NAME'].'/profile/'.$user->username[0].'">Mon profil</a>';
          //Ajout page FT si besoin
          if($user->roles[0] === "foodtruck"){
            echo '<a class="" href="http://'.$_SERVER['SERVER_NAME'].'/foodtruck/'.$user->username[2].'">Mon FoodTruck</a>';
          }else if($user->roles[0] === "admin"){ //Page Admin
            echo '<a class="" href="'.$_SERVER['SERVER_NAME'].'/administration">Admin</a>';
          }
        }else{
          echo '<a class="" href="http://'.$_SERVER['SERVER_NAME'].'/inscription">Inscription Client</a>';
          echo '<a class="" href="http://'.$_SERVER['SERVER_NAME'].'/inscriptionTrucks">Inscription Trucks</a>';
        }
        ?>
        <!-- Bouton Login/logout -->
        <?php
          if(isset($user)){
            echo '<h5>Bonjour '.$user->username[1].' !</h5>';
            echo '<button type="button" class="btn btn-outline-info" onclick="deconnectMe();">Log out</button>';
          }else{
            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Sign In</button>';
          }
        ?>
        
        
      </div>
    </nav>

<!-- Modal LOGIN-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5>Admin: malesuada@sedet.ca</h5>
      <h5>Client: non@Maurisnondui.net</h5>
      <h5>Pro: sagittis.placerat@Donecat.co.uk</h5>
      <h5>Truck: rhoncus.id@neccursusa.net</h5>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">email</div>
                </div>
                <input type="text" class="form-control" id="login" value="malesuada@sedet.ca">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Mot de passe</div>
                </div>
                <input class="form-control" type="password" id="password" value="123">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-outline-primary" onclick="checkMyName();">Valider</button>
      </div>
    </div>
  </div>
</div>