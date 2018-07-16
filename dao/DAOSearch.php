<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\dao\DAOCategorie;
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

        $sql = "SELECT * FROM favoris";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeToReturn = array();

        foreach ($resultats as $item) {
            $newObjet = $this->retrieve(new FavorisModel($item['utilisateur_id'],$item['foodtruck_id']));
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    public function getAllBy($filter) {
    }

    public function update($array) {
    }

    public function getLastFive() {
    }

}
