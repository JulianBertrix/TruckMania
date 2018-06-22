<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;

class UtilisateurController extends Controller {

    private $user;

    public function __construct(){
        parent::__construct();
        $this->user = new DAOUtilisateur();
    }

    public function getAll(){
        return $this->user->getAll();
    }

    public function retrieve($id){
        return $this->user->retrieve($id);
    }

    public function create($newUser){
        return $this->user->create($newUser);
    }


    public function testMe(){
        $this->render('test');
    }

}
