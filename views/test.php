<?php
include 'header.php';
use BWB\Framework\mvc\controllers\UtilisateurController;
$newUser = new UtilisateurController();

$listeArg = ['nom' => 'Robin'];
$toto = $newUser->getAllBy($listeArg);
var_dump($toto);

// $tutu = $newUser->create($toto);
?>
