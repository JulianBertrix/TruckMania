<?php
include 'header.php';

use BWB\Framework\mvc\controllers\CommandeController;
use BWB\Framework\mvc\models\CommandeModel;

$newControl = new CommandeController();

echo "<h3>TEST CREATE</h3><br>";

$newItem = $newControl->theLastOne();

$newControl->create($newItem);

var_dump($newControl->theLastOne());



// echo "<h3>TEST DELETE</h3><br>";

// $newControl->delete(56);
// var_dump($newControl->theLastOne());



// echo "<h3>TEST GETALL</h3><br>";

// var_dump($newControl->getAll());



// echo "<h3>TEST GETALLBY</h3><br>";

// var_dump($newControl->getAll());



// echo "<h3>TEST RETRIEVE</h3><br>";

// var_dump($newControl->retrieve(1));


// $datas = ['message' => 'cacahoute' , 'note' => 5];
// var_dump($newControl->retrieve(1));
// $newControl->updateMe(1,$datas);
// var_dump($newControl->retrieve(1));


?>
