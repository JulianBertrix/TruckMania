<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\dao\DAOTrucks;

class TrucksController extends Controller {

    private $truck;

    function __construct(){
        parent::__construct();
        //Creation d'un DAOTrucks
        $this->truck = new DAOTrucks();
    }


    public function getTrucksFive() {
       return $this->truck->getLastFive();
    }

    public function testMe(){
        $this->render("test");
    }

}
