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
        return $this->getPdo()->query($sql)->fetchAll();
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
            $truck = new TrucksModel();
            $truck->setId($result->getId());
            $truck->setSiret($result->getSiret());
            $truck->setNom($result->getNom());       
            $truck->setDateCreation($result->getDateCreation());
            $truck->setCategorieId($result->getCategorieId());  
            $truck->setMoyenne($result->setMoyenne());  
            array_push($trucks, $truck);
        }
        var_dump($trucks);
        return $trucks;
//        $sql = "SELECT * FROM foodtruck WHERE id=".$filter->getId()." OR siret=".$filter->getSiret()." OR nom='".$filter->getNom()."' "
//                . "OR categorie_id=".$filter->getCategorieId()." OR moyenne=".$filter->getMoyenne();
//        echo $sql;
//        return $this->getPdo()->query($sql)->fetchAll();
    }

    public function retrieve($id) {
        $sql = "SELECT * FROM foodtruck WHERE id=".$id;
        return $this->getPdo()->query($sql)->fetch();
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
