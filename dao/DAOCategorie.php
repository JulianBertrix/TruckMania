<?php
namespace BWB\Framework\mvc\dao;
use \BWB\Framework\mvc\DAO; 
use \BWB\Framework\mvc\models\CategorieModel;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOCategorie
 *
 * @author julianbertrix
 */
class DAOCategorie extends DAO{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function create($array) {
        $sql = "INSERT INTO categorie (intitule) VALUE ('".$array->getIntitule()."')";
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function delete($id) {
        $sql = "DELETE FROM categorie WHERE id=".$id;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function getAll() {
        $sql = "SELECT * FROM categorie";
        return $this->getPdo()->query($sql)->fetchAll();
    }

    public function getAllBy($filter) {
        $sql = "SELECT * FROM categorie";
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
        
        $categories = array();

        foreach ($results as $result){
            $categorie = new CategorieModel();
            $categorie->setId($result->getId());
            $categorie->setIntitule($result->getIntitule());
            
            array_push($categories, $categorie);
        }
        var_dump($categories);
        return $categories;
    }

    public function retrieve($id) {
        $sql = "SELECT * FROM categorie WHERE id=".$id;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function update($array) {
        $sql = "UPDATE categorie SET intitule='".$array->getIntitule()."' WHERE id=".$array->getId();
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }

}
