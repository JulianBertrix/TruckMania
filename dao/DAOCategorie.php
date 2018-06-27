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
        
        $results = $this->getPdo()->query($sql);
        
    }

    public function delete($id) {
        $sql = "DELETE FROM categorie WHERE id=".$id;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function getAll() {
        $sql = "SELECT * FROM categorie";

        $results = $this->getPdo()->query($sql)->fetchAll();

        $categories = array();

        foreach ($results as $result){
            $categorie = new CategorieModel($result['id'],$result['intitule']);
            array_push($categories, $categorie);
        }
        
        return $categories;
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
        
        $results = $this->getPdo()->query($sql)->fetchAll();
        
        $categories = array();

        foreach ($results as $result){
            $categorie = new CategorieModel($result['id'],$result['intitule']);
            array_push($categories, $categorie);
        }
        
        return $categories;
    }

    public function retrieve($id) {
        $sql = "SELECT * FROM categorie WHERE id=".$id;
        $result = $this->getPdo()->query($sql)->fetch();
        return new CategorieModel($result['id'],$result['intitule']);
    }

    public function update($array) {
        $sql = "UPDATE categorie SET intitule='".$array->getIntitule()."' WHERE id=".$array->getId();
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }

}
