<?php
include 'header.php';

use BWB\Framework\mvc\controllers\PresenceController;
use BWB\Framework\mvc\models\PresenceModel;

$newControl = new PresenceController();

echo "<h3>TEST CREATE</h3><br>";
$newItem = new PresenceModel(5,7,9);
var_dump($newItem);
$newControl->create($newItem);

//var_dump($newControl->theLastOne());



// echo "<h3>TEST DELETE</h3><br>";
// $obj = $newControl->theLastOne();
// $newControl->delete($obj->getId());
// var_dump($newControl->theLastOne());



// echo "<h3>TEST GETALL</h3><br>";

// var_dump($newControl->getAll());



// echo "<h3>TEST GETALLBY</h3><br>";

// $filtre = ['date_debut' => '2018-07-12 18:00:00'];

// var_dump($newControl->getAllBy($filtre));



// echo "<h3>TEST RETRIEVE</h3><br>";
// var_dump($newControl->retrieve(1));

// echo "<h3>TEST UPDATE</h3><br>";
// $datas = ['date_debut' => '2018-07-12 17:00:00'];
// var_dump($newControl->retrieve(1));
// $newControl->updateMe(1,$datas);
// var_dump($newControl->retrieve(1));


?>
