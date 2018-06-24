<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOAdresse;

class AdresseController extends Controller {

    private $adresse;

    public function __construct(){
        parent::__construct();
        $this->adresse = new DAOAdresse();
    }

    public function getAll(){
        return $this->adresse->getAll();
    }

    public function getAllBy($filter){
        return $this->adresse->getAllBy($filter);
    }
    public function retrieve($id){
        return $this->adresse->retrieve($id);
    }

    public function create($newAdresse){
        return $this->adresse->create($newAdresse);
    }

    public function delete($id){
        return $this->adresse->delete($id);
    }

    public function updateMe($idAdresse,$newValeurs) {
        return $this->adresse->updateMe($idAdresse,$newValeurs);
    }

    public function update($newValeurs) {
        return $this->adresse->update($newValeurs);
    }

    public function theLastOne() {
        return $this->adresse->theLastOne();
    }

}
