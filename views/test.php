<?php
include 'header.php';
use BWB\Framework\mvc\controllers\TrucksController;
use BWB\Framework\mvc\models\TrucksModel;

$newControl = new TrucksController();

//CREATE
echo "<h3>TEST CREATE</h3><br>";

$newItem = new TrucksModel("3545454", "nomeee", "dfdf", 5, 2);
var_dump($newControl->addTruck($newItem));
?>
