<?php
include 'header.php';

use BWB\Framework\mvc\controllers\AvisController;
use BWB\Framework\mvc\models\AvisModel;

$newControl = new AvisController();

//CREATE
echo "<h3>TEST CREATE</h3><br>";

$newItem = new AvisModel('Ceci est un message Test',3.6);

$newControl->add($newItem);

var_dump($newControl->theLastOne());

//DELETE
// echo "<h3>TEST DELETE</h3><br>";

// $newItem = new AvisModel('Ceci est un message Test',3.6);

// $newControl->create($newItem);



// $listeArg = ['nom' => 'Toto'];
// $newUser->updateMe(5,$listeArg);



// $tutu = $newUser->create($toto);
?>
