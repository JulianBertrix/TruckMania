<?php
namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOTruckEvenement;
use BWB\Framework\mvc\models\EvenementModel;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\models\TruckEvenementModel;

class TruckEvenementController extends Controller {
    private $truckEvenement;

    public function __construct(){
        parent::__construct();
        $this->truckEvenement = new DAOTruckEvenement();
    }

    public function getAllEventsForCalendar($idTruck){

        //Pour un FT, recup de tous ses objets events
        $listeEventsObj = $this->truckEvenement->eventsForTruck($idTruck);

        //Creation de la liste en json des infos + format events de FullCalendar

        $listeJson = [];

        foreach($listeEventsObj as $objet){
            array_push($listeJson,$objet->jsonSerialize());
        }

        header('Content-Type: application/json');
        echo json_encode($listeJson);
    }

    public function deleteMe($idTruck,$idEvent){

        $newEvent = new TruckEvenementModel();
        $newEvent->setMyTruck($idTruck);
        $newEvent->setMyEvent($idEvent);

        $this->truckEvenement->delete($newEvent);
    }

    public function delete($id){
    }

    public function getAll(){
    }

    public function getAllBy($filter){
    }

    public function retrieve($id){
    }

    public function create($newEvenement){
    }

    public function update($newValeurs){
    }

}