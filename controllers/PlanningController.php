<?php
namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOPlanning;
use BWB\Framework\mvc\dao\DAOMap;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\models\PlanningModel;
use BWB\Framework\mvc\models\AdresseModel;

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

        $test = ['events' => $listeJson];

        header('Content-Type: application/json');
        echo json_encode($listeJson);
    }

    public function updateThePlanning(){

        //Recup datas du Post
        $dataPost = $this->inputPost();

        //Recup de l'ancien objet
        $oldObject = $this->planning->retrieve($dataPost['listeIds']);

        //Check de l'adresse, si changement creation d'un nouvel id adresse

        $idReturn;

        if($oldObject->getAdresseId()->getAdresse() !== $dataPost['adresse']){

            //Recup des coordonnees GPS de la nouvelle adresse
            $coord = (new DAOMap())->giveMeTheGPS($dataPost['adresse']);

            //creation du nouvel objet Adresse
            $newAdresse = new AdresseModel();
            $newAdresse->setAdresse($dataPost['adresse']);
            $newAdresse->setLatitude($coord['lat']);
            $newAdresse->setLongitude($coord['lng']);

            $daoAdresse = new DAOAdresse();

            $idReturn = (new DAOAdresse())->create($newAdresse);

        }else{
            $idReturn = $oldObject->getAdresseId()->getId();
        }

        //Suppression de l'ancien objet
        $this->planning->delete($dataPost['listeIds']);

        //Ajout du nouveau planning
        $newPlanning = new PlanningModel();
        $newPlanning->setFoodtruckId(intval($dataPost['listeIds']['foodtruck_id']));
        $newPlanning->setAdresseId($idReturn);
        $newPlanning->setDateDebut($dataPost['date_debut']);
        $newPlanning->setDateFin($dataPost['date_fin']);
        $newPlanning->setIntitule($dataPost['intitule']);

        $this->planning->create($newPlanning);

    }

    //DUPLIQUER UN MOIS
    public function duplicateMonth($id){
        
        //Recup dates dans le Post
        $dataPost = $this->inputPost();
        $startDate = $dataPost['start'];
        $endDate = $dataPost['end'];

        //Si mois suivant déjà rempli, supprime les dates
        $oldDates = getTheDateBetween($id,$startDate,$endDate);

        if(sizeof($oldDates) > 0){

            foreach ($oldDates as $myDate) {
                $listeIds = [
                    'foodtruck_id' => $myDate->getFoodtruckId()->getId,
                    'date_debut'=> $myDate->getDateDebut(),
                    'date_fin'=>$myDate->getDateFin()
                ];

                $this->planning->delete($listeIds);
            }

        }

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
