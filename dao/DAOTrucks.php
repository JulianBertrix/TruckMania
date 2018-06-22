<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\TrucksModel;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAODefault
 *
 * @author loic
 */
class DAOTrucks extends DAO{

    public function __construct(){
        parent::__construct();
    }

    //put your code here
    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        
    }

    public function update($array) {
        
    }

    public function getLastFive() {
        
        $sql = "SELECT * FROM foodtruck ORDER BY date_creation DESC LIMIT 5";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $trucks = array();

        foreach ($resultats as $result) {
            $truck = new TrucksModel();
            $truck->setId($result['id']);
            $truck->setSiret($result['siret']);
            $truck->setNom($result['nom']);
            $truck->setDateCreation($result['date_creation']);
            $truck->setLogo($result['logo']);
            $truck->setCategorieId($result['categorie_id']);
            $truck->setMoyenne($result['moyenne']);

            array_push($trucks,$truck);
        }

        return $trucks;
    }

}
