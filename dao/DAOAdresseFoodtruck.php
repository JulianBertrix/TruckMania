<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\models\AdresseFoodtruckModel;
/**
 * Description of DAOAdresseFoodtruck
 *
 * @author julianbertrix
 */
class DAOAdresseFoodtruck extends DAO{
    public function __construct(){
        parent::__construct();
    }
    
    public function create($array) {
        $sql = "INSERT INTO adresse_foodtruck (foodtruck_id, adresse_id, intitule)"
                . " VALUES ('".$array->getFoodtruckId()."','".$array->getAdresseId()."','".$array->getIntitule()."')";
        return $this->getPdo()->query($sql)->fetch();
    }
    
    public function delete($objet) {
        $sql = "DELETE FROM adresse_foodtruck WHERE foodtruck_id=".$objet->getFoodtruckID()." AND adresse_id=".$objet->getAdresseID();
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function getAll() {
        $sql = "SELECT * FROM adresse_foodtruck";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $liste = array();

        foreach ($resultats as $item) {
            $newAdresseFT = $this->retrieve(new AdresseFoodtruckModel($item['foodtruck_id'], $item['adresse_id']), $item['intitule']);
            array_push($liste,$newAdresseFT);
        }

        return $liste;
    }

    public function getAllBy($filter) {
        $request = "SELECT * FROM adresse_foodtruck ";

        $i = 0;

        foreach ($filter as $key => $value) {
            if($i===0){
                $request .= "WHERE ";
                $i++;
            }else{
                $request .= "AND ";
            }
            $request .= $key."='".$value."' ";
        }
        
        $resultats = $this->getPdo()->query($request)->fetchAll();
        var_dump($resultats);
        $listeToReturn = array();

        foreach ($resultats as $item) {          
            $newObjet = $this->retrieve($item['id']);
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    public function retrieve($objet) {
        
       //Recup de l'objet foodtruck
       $newTruck = (new DAOTrucks())->retrieve($objet->getFoodtruckId());
       
       //Recup de l'objet adresse
       $newAdresse = (new DAOAdresse())->retrieve($objet->getAdresseId());
       
       //Creation du nouvel objet d'objets
       $newObjet = new AdresseFoodtruckModel($newTruck,$newAdresse);
       
       return $newObjet;
    }

    public function update($array) {
        $sql = "UPDATE adresse_foodtruck SET adresse_id='".$array->getAdresseId()."', intitule='".$array->getIntitule()."' "
                . "WHERE foodtruck_id=".$array->getFoodtruckId();
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }
}
