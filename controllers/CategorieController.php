<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use \BWB\Framework\mvc\Controller;
use \BWB\Framework\mvc\dao\DAOCategorie;
/**
 * Description of CategorieController
 *
 * @author julianbertrix
 */
class CategorieController extends Controller{
    private $categorie;

    function __construct(){
        parent::__construct();
        //Creation d'un DAOCategorie
        $this->categorie = new DAOCategorie();
    }
    
    public function deleteCategorie($id){
        return $this->categorie->delete($id);
    }
    
    public function updateCategorie($array){
        return $this->categorie->update($array);
    }
    
    public function addCategorie($array){
        return $this->categorie->create($array);
    }
    
    public function getCategorie($id){
        return $this->categorie->retrieve($id);
    }
    
    public function getAllCategorieBy($filter){
        return $this->categorie->getAllBy($filter);
    }
    
    public function getAllCategorie(){
        return $this->categorie->getAll();
    }
    
    public function testMe(){
        $this->render("test");
    }
}
