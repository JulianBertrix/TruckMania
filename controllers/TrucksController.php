<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\dao\DAOTrucks;

class TrucksController extends Controller {

    private $id;
    private $siret;
    private $nom;
    private $dateCreation;
    private $logo;
    private $categorieId;
    private $moyenne;
    private $truck;

    function __construct(){
        parent::__construct();
        //Creation d'un DAOTrucks
        $this->truck = new DAOTrucks();
    }

    public function getAllJSON(){
        header("Content-Type: application/json");
        echo json_encode($this->truck->getAll());
    }
    
    public function deleteTruck($id){
        return $this->truck->delete($id);
    }
    
    public function addTruck($array){
        return $this->truck->create($array);
    }
    public function getTrucksFive() {
       return $this->truck->getLastFive();
    }
    
    public function getTruck($id){
        return $this->truck->retrieve($id);
    }
    
    public function getAllTrucksBy($filter){
        return $this->truck->getAllBy($filter);
    }
    
    public function getAllTrucks(){
        return $this->truck->getAll();
    }

    public function updateTruck($array){
        return $this->truck->update($array);
    }
    
    public function testMe(){
        $this->render("test");
    }

}
