<?php
include 'header.php';

use BWB\Framework\mvc\controllers\PresenceController;
use BWB\Framework\mvc\models\PresenceModel;

$newControl = new PresenceController();

// echo "<h3>TEST CREATE</h3><br>";
// $newItem = new PresenceModel(9,4,4);
// var_dump($newItem);
// $newControl->create($newItem);

//var_dump($newControl->theLastOne());



// echo "<h3>TEST DELETE</h3><br>";
// $obj = $newControl->theLastOne();
// $newItem = new PresenceModel(9,4,4);
// $newControl->delete($newItem);
//var_dump($newControl->theLastOne());


$newItem = new PresenceModel(4,4,4);

// echo "<h3>TEST GETALL</h3><br>";

// var_dump($newControl->getAll());



// echo "<h3>TEST GETALLBY</h3><br>";

// $filtre = ['planning_id' => 1];

// var_dump($newControl->getAllBy($filtre));



// echo "<h3>TEST RETRIEVE</h3><br>";
// var_dump($newControl->retrieve($newItem));

// echo "<h3>TEST UPDATE</h3><br>";
// $datas = ['planning_id' => 2];
// var_dump($newControl->retrieve($newItem));
// $newControl->updateMe($newItem,$datas);
// var_dump($newControl->retrieve($newItem));

?>
