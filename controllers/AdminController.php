<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;

use BWB\Framework\mvc\dao\DAOCommande;
use BWB\Framework\mvc\dao\DAOEvenement;

class AdminController extends Controller{

    public function __construct(){
        parent::__construct();
        $this->securityLoader();
    }

    public function adminPage(){
        $trucks = (new DAOTrucks())->getAll();
    
        $data = array(
            'listeTrucks'=> $trucks,
            'listeUser' =>(new DAOUtilisateur())->getAll(),
            'listeCommande' =>(new DAOCommande())->getAll(),
            'listeEvenement' =>(new DAOEvenement())->getAll()
        );

        $this->render('admin/admin-page',$data);
        
    }

    // public function getAllUser(){
    //     return  (new DAOUtilisateur())->getAll();
    // }

    // public function getAllCommande(){
    //     return (new DAOCommande())->getAll();
    // }

    // public function getAllEvenement(){
    //     return (new DAOEvenement())->getAll();
    // }

}

