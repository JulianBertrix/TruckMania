<?php
namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\EvenementModel;
use BWB\Framework\mvc\dao\DAOEvenement;



class EvenementController extends Controller {

    private $evenement;

    public function __construct(){
        parent::__construct();
        $this->evenement = new DAOEvenement();
    }

    public function getAllJSON(){
        header("Content-type: application/json");
        echo json_encode($this->evenement->getAll());
    }

    public function retrieve($id){
        return $this->evenement->retrieve($id);
    }

    public function getAll(){
        return $this->evenement->getAll();
    }

    public function getAllBy($filter){
        return $this->evenement->getAllBy($filter);
    }

    public function getLastFive(){
        return $this->evenement->getLastFive();
    }

    public function create($newEvenement){
        return $this->evenement->create($newEvenement);
    }

    public function delete($id){
        return $this->evenement->delete($id);
    }

    public function updateMe($idUser,$newValeurs){
        return $this->evenement->updateMe($idUser,$newValeurs);
    }

    public function update($newValeurs){
        return $this->evenement->update($newValeurs);
    }

    public function getEvenementFive(){
        return $this->evenement->getEvenementFive();
    }

    public function testMe(){
        $this->render('test');
    }

}