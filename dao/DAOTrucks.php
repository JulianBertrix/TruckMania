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

    public function create($array) {
        $sql = "INSERT INTO foodtruck (siret, nom, date_creation, logo, categorie_id, moyenne)"
                . " VALUES ('".$array->getSiret()."','".$array->getNom()."','".$array->getDateCreation()."','"
                . "".$array->getLogo()."','".$array->getCategorieId()."','".$array->getMoyenne()."')";
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function delete($id) {
        $sql = "DELETE FROM foodtruck WHERE id=".$id;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function getAll() {
        $sql = "SELECT * FROM foodtruck";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $foodtrucks = array();

        foreach ($resultats as $item) {
            $newTruck = $this->retrieve($item['id']);
            array_push($foodtrucks,$newTruck);
        }

        return $foodtrucks;
    }

    public function getAllBy($filter) {
        $sql = "SELECT * FROM foodtruck";
        $i = 0;

        foreach ($filter as $key => $value){
            if($i === 0){
                $sql .= " WHERE ";
            }else{
                $sql .= " AND ";
            }
            $sql .= $key."='".$value."' ";
            $i++;
        }
        echo $sql;
        $results = $this->getPdo()->query($sql)->fetchAll();
        var_dump($results);
        $trucks = array();

        foreach ($results as $result){
            $truck = $this->retrieve($result['id']); 
            array_push($trucks, $truck);
        }
        
        return $trucks;
    }

    public function retrieve($id) {
        $sql = "SELECT * FROM foodtruck WHERE id=".$id;
        $item = $this->getPdo()->query($sql)->fetch();
        $newObjet = new TrucksModel();
        $newObjet->setId($item['id']); 
        $newObjet->setSiret($item['siret']);
        $newObjet->setNom($item['nom']);
        $newObjet->setDateCreation($item['date_creation']);
        $newObjet->setLogo($item['logo']);
        $newObjet->setMoyenne($item['moyenne']);
        
        //Recup de l'objet categorie
        $newItem = (new DAOCategorie())->retrieve($item['categorie_id']);
        $newObjet->setCategorieId($newItem);
        
        return $newObjet;
    }

    public function update($array) {
        $sql = "UPDATE foodtruck SET nom='".$array->getNom()."', logo='".$array->getLogo()."', "
                . "categorie_id='".$array->getCategorieId()."' WHERE id=".$array->getId();
        return $this->getPdo()->query($sql)->fetch();
    }

    public function getLastFive() {
        
        $sql = "SELECT * FROM foodtruck ORDER BY date_creation DESC LIMIT 5";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $trucks = array();

        foreach ($resultats as $result) {
            $truck = $this->retrieve($result['id']); 
            array_push($trucks, $truck);
        }

        return $trucks;
    }

}
