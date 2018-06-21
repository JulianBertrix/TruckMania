<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\dao\DAOTrucks;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewController
 *
 * @author loic
 */
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

}
