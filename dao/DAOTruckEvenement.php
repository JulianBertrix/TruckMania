<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\dao\DAOEvenement;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\models\TruckEvenementModel;

class DAOTruckEvenement extends DAO{

    public function __construct(){
        parent::__construct();
    }
    
    public function create($listeIds) {

        $sql = "INSERT INTO foodtruck_evenement (foodtruck_id, evenement_id) VALUES ("
        .$listeIds['foodtruck_id'].","
        .$listeIds['evenement_id'].")";

        $this->getPdo()->query($sql);

        return $this->getPdo()->lastInsertId();
        
    }

    public function delete($id) {
        $sql = "DELETE FROM foodtruck_evenement WHERE id=".$id;
        $this->getPdo()->query($sql);
    }

    public function getAll() {
        $sql = "SELECT * FROM foodtruck_evenement";
        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $ListeRetour = array();

        foreach($resultats as $item){
            $ids = ['foodtruck_id' => $item['foodtruck_id'],'evenement_id' => $item['evenement_id']];
            $newObjet = $this->retrieve($ids);
            array_push($ListeRetour,$newObjet);
        }

        return $ListeRetour;
    }

    //Liste des evenements pour un FT
    public function eventsForTruck($idTruck) {

        $sql = "SELECT * FROM foodtruck_evenement WHERE foodtruck_id = ".$idTruck;

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $ListeRetour = array();

        foreach($resultats as $item){
            $newObjet = (new DAOEvenement())->retrieve($item['evenement_id']);
            array_push($ListeRetour,$newObjet);
        }

        return $ListeRetour;
    }

    //Liste des FT pour un evenement
    public function trucksForEvent($idEvent) {

        $request = "SELECT * FROM foodtruck_evenement WHERE evenement_id = ".$idEvent;

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $ListeRetour = array();

        foreach($resultats as $item){
            $newObjet = (new DAOTrucks())->retrieve($item['foodtruck_id']);
            array_push($ListeRetour,$newObjet);
        }

        return $ListeRetour;
    }

    public function retrieve($listeIds) {

        $sql = "SELECT * FROM foodtruck_evenement WHERE
         foodtruck_id = ".$listeIds['foodtruck_id']." AND evenement_id = ".$listeIds['evenement_id'];

        $result = $this->getPdo()->query($sql)->fetch();

        $newTruckEvent = new DAOTruckEvenement();

        //Recuperation des objets Truck et Evenement pour inséerer dans objet TruckEvenement

        $newTruckEvent->setMyTruck((new DAOTrucks())->retrieve($result['foodtruck_id']));
        $newTruckEvent->setMyEvent((new DAOEvenement())->retrieve($result['evenement_id']));

        return $newTruckEvent;
        
    }

    public function update($array) {
        
    }

    public function getAllBy($filter) {

    }
}
