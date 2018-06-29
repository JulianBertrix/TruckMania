<?php
namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOTruckEvenement;
use BWB\Framework\mvc\models\EvenementModel;
use BWB\Framework\mvc\models\TrucksModel;

class TruckEvenementController extends Controller {
    private $truckEvenement;

    public function __construct(){
        parent::__construct();
        $this->evenement = new DAOTruckEvenement();
    }

    public function getAllEventsForCalendar($idTruck){

        //Pour un FT, recup de tous ses objets events
        $listeEventsObj = $this->truckEvenement->eventsForTruck($idTruck);

        //Creation de la liste en json

        $listeJson = [];

        foreach($listeEventsObj as $objet){
            array_push($listeJson,$objet->to_json());
        }

        return ;
    }

    public function getAll(){
    }

    public function getAllBy($filter){
    }

    public function retrieve($id){
    }

    public function create($newEvenement){
    }

    public function delete($id){
    }

    public function update($newValeurs){
    }

}