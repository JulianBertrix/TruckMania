<?php
include 'header.php';

use BWB\Framework\mvc\controllers\UtilisateurController;
use BWB\Framework\mvc\models\UtilisateurModel;

$newControl = new UtilisateurController();

// echo "<h3>TEST CREATE</h3><br>";
// $newItem = $newControl->theLastOne();
// var_dump($newItem);
// $newControl->create($newItem);

// var_dump($newControl->theLastOne());



// echo "<h3>TEST DELETE</h3><br>";
// $obj = $newControl->theLastOne();
// $newControl->delete($obj->getId());
// var_dump($newControl->theLastOne());



// echo "<h3>TEST GETALL</h3><br>";

// var_dump($newControl->getAll());



// echo "<h3>TEST GETALLBY</h3><br>";

// $filtre = ['email' => 'et.pede@ipsumnonarcu.ca'];

// var_dump($newControl->getAllBy($filtre));



echo "<h3>TEST RETRIEVE</h3><br>";
var_dump($newControl->retrieve(1));

// echo "<h3>TEST UPDATE</h3><br>";
// $datas = ['adresse' => 'tata'];
// var_dump($newControl->retrieve(1));
// $newControl->updateMe(1,$datas);
// var_dump($newControl->retrieve(1));


?>
