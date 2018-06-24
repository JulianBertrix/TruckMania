<?php
include 'header.php';

use BWB\Framework\mvc\controllers\FavorisController;
use BWB\Framework\mvc\models\FavorisModel;

$newControl = new FavorisController();

// echo "<h3>TEST CREATE</h3><br>";
// $newItem = new FavorisModel(1,4);
// var_dump($newItem);
// $newControl->create($newItem);

//var_dump($newControl->theLastOne());



// echo "<h3>TEST DELETE</h3><br>";
// $newItem = new FavorisModel(1,4);
// $newControl->delete($newItem);


$newItem = new FavorisModel(4,1);

// echo "<h3>TEST GETALL</h3><br>";

// var_dump($newControl->getAll());



// echo "<h3>TEST GETALLBY</h3><br>";

// $filtre = ['utilisateur_id' => 1];

// var_dump($newControl->getAllBy($filtre));



// echo "<h3>TEST RETRIEVE</h3><br>";
// var_dump($newControl->retrieve($newItem));

echo "<h3>TEST UPDATE</h3><br>";
$datas = ['utilisateur_id' => 1];
var_dump($newControl->retrieve($newItem));
$newControl->updateMe($newItem,$datas);

?>
