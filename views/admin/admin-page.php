<?php include './views/header.php' ?><br><br>

<body class="fixed-nav sticky-footer bg-dark">
<div class="content-wrapper">
<div class="container-fluid">

<?php include 'include/icon-card.php' ?>

<br><br><br>

<?php 

switch($_SERVER["REQUEST_URI"]){
  case "/administration/trucks":
  include 'include/data-table-food-truck.php';
  break;
  case "/administration/users":
  include 'include/data-table-client.php';
  break;
  case "/administration/commande":
  include 'include/data-table-commande.php';
  break;
  case "/administration/evenement":
  include 'include/data-table-evenement.php';
  break;
}
?>
<br><br><br>
</div><!-- /.content-wrapper-->
</div><!-- /.container-fluid-->

<?php include './views/footer.php' ?>
