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

    public function getAllPlanningForCalendar($idTruck){

        //Pour un FT, recup de tous ses objets planning
        $filtre = ['foodtruck_id' => $idTruck];
        $listeplanningObj = $this->planning->getAllBy($filtre);

        //Creation de la liste en json des infos + format events de FullCalendar

        $listeJson = [];

        foreach($listeplanningObj as $objet){
            array_push($listeJson,$objet->jsonSerialize());
        }

        header('Content-Type: application/json');
        echo json_encode($listeJson);
    }

    public function getAll(){
        return $this->planning->getAll();
    }

    public function getAllBy($filter){
        return $this->planning->getAllBy($filter);
    }

    public function getAllByDate($dateP){
        return $this->planning->getAllByDate($dateP);
    }

    public function retrieve($listeIds){
        return $this->planning->retrieve($listeIds);
    }

    public function create($newPlanning){
        return $this->planning->create($newPlanning);
    }

    public function planningForTruck($idTruck){
        return $this->planning->planningForTruck($idTruck);
    }

    public function delete($id){
        return $this->planning->delete($id);
    }

    public function update($newValeurs) {
        return $this->planning->update($newValeurs);
    }


}
