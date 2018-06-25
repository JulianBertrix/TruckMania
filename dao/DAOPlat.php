<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use \BWB\Framework\mvc\models\PlatModel;
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
class DAOPlat extends DAO{
    public function __construct(){
        parent::__construct();
    }
    
    public function create($array) {
        $sql = "INSERT INTO plat (nom, description, prix, image, date_creation, foodtruck_id)"
                . " VALUES ('".$array->getNom()."','".$array->getDescription()."','".$array->getPrix()."','"
                . "".$array->getImage()."','".$array->getDateCreation()."','".$array->getFoodtruckId()."')";
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function delete($id) {
        $sql = "DELETE FROM plat WHERE id=".$id;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function getAll() {
        $sql = "SELECT * FROM plat";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $plats = array();

        foreach ($resultats as $item) {
            $newPlat = $this->retrieve($item['id']);
            array_push($plats,$newPlat);
        }

        return $plats;
    }

    public function getAllBy($filter) {
        $sql = "SELECT * FROM plat";
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
        
        $results = $this->getPdo()->query($sql)->fetchAll();
        var_dump($results);
        
        $plats = array();

        foreach ($results as $result){
            $plat = new PlatModel();
            $plat->setId($result->getId());
            $plat->setNom($result->getNom());
            $plat->setDescription($result->getDescription());       
            $plat->setPrix($result->getPrix());
            $plat->setImage($result->getImage());  
            $plat->setDateCreation($result->getDateCreation());  
            $plat->setFoodtruckId($result->getFoodtruckId());
            array_push($plats, $plat);
        }
        var_dump($plats);
        return $plats;
    }

    public function retrieve($id) {
        $sql = "SELECT * FROM plat WHERE id=".$id;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function update($array) {
        $sql = "UPDATE plat SET nom='".$array->getNom()."', description='".$array->getDescription()."', "
        . "prix='".$array->getPrix()."', image='".$array->getImage()."' WHERE id=".$array->getId();
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }

}
