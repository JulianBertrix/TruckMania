<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;

class AdminController extends Controller{

    public function __construct(){
        parent::__construct();
        $this->securityLoader();
    }

    public function getAllTrucks(){
        $trucks = (new DAOTrucks)->getAll();
    
        $data = array(
            'listeTrucks'=> $trucks,
            'listeUser' =>$this->getAllUser()
        );

        $this->render('test',$data);
        
    }

    public function getAllUser(){
        $user = (new DAOUtilisateur)->getAll();

        $dataUser = array(
            'listeUser'=> $user
        );

        $this->render('test',$dataUser);
    }

}

