<?php
namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\EvenementModel;
use BWB\Framework\mvc\dao\DAOEvenement;



class EvenementController extends Controller {
    private $evenement;

    function __construct(){
        parent::__construct();
        $this->evenement = new DAOEvenement();
    }

    public function getEvenementFive(){
        return $this->evenement->getEvenementFive();
    }

    public function testMe(){
        
        $this->render('test');    
    }
}