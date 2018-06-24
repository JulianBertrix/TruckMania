<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOPlanning;

class PlanningController extends Controller {

    private $planning;

    public function __construct(){
        parent::__construct();
        $this->planning = new DAOPlanning();
    }

    public function getAll(){
        return $this->planning->getAll();
    }

    public function getAllBy($filter){
        return $this->planning->getAllBy($filter);
    }
    public function retrieve($id){
        return $this->planning->retrieve($id);
    }

    public function create($newPlanning){
        return $this->planning->create($newPlanning);
    }

    public function delete($id){
        return $this->planning->delete($id);
    }

    public function updateMe($idPlanning,$newValeurs) {
        return $this->planning->updateMe($idPlanning,$newValeurs);
    }

    public function update($newValeurs) {
        return $this->planning->update($newValeurs);
    }

    public function theLastOne() {
        return $this->planning->theLastOne();
    }

}
