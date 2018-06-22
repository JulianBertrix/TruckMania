<?php
include 'header.php';
use BWB\Framework\mvc\controllers\UtilisateurController;
$newUser = new UtilisateurController();
$toto = $newUser->retrieve(5);

$tutu = $newUser->create($toto);
?>