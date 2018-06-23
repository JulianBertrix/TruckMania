<?php
include 'header.php';

use BWB\Framework\mvc\controllers\AvisController;
use BWB\Framework\mvc\models\AvisModel;

$newControl = new AvisController();

//CREATE
// echo "<h3>TEST CREATE</h3><br>";

// $newItem = new AvisModel('Ceci est un message Test',3.6);

// $newControl->create($newItem);

// var_dump($newControl->theLastOne());

//DELETE
// echo "<h3>TEST DELETE</h3><br>";

// $newControl->delete(56);
// var_dump($newControl->theLastOne());

//GETALL
// echo "<h3>TEST GETALL</h3><br>";

// var_dump($newControl->getAll());

//GETALLBY
// echo "<h3>TEST GETALLBY</h3><br>";

// var_dump($newControl->getAll());

//RETRIEVE
// echo "<h3>TEST RETRIEVE</h3><br>";

// var_dump($newControl->retrieve(1));

//UPDATEME

// $datas = ['message' => 'cacahoute' , 'note' => 5];
// var_dump($newControl->retrieve(1));
// $newControl->updateMe(1,$datas);
// var_dump($newControl->retrieve(1));


?>
