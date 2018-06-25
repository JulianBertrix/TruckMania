<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use \BWB\Framework\mvc\Controller;
use \BWB\Framework\mvc\dao\DAOAdresseFoodtruck;
/**
 * Description of AdresseFoodtruckController
 *
 * @author julianbertrix
 */
class AdresseFoodtruckController extends Controller{
    private $adresseFT;

    function __construct(){
        parent::__construct();
        //Creation d'un DAOPlat
        $this->adresseFT = new DAOAdresseFoodtruck();
    }
    
    public function getAllAdresseFoodtruck(){
        return $this->adresseFT->getAll();
    }
    public function getAllAdresseFoodtruckBy($filter){
        return $this->adresseFT->getAllBy($filter);
    }
    
    public function createAdresseFoodtruck($array){
        return $this->adresseFT->create($array);
    }
    
    public function getAdresseFoodtruck($objet){
        return $this->adresseFT->retrieve($objet);
    }
    
    public function deleteAdresseFoodtruck($objet){
        return $this->adresseFT->delete($objet);
    }
    
    public function updateAdresseFoodtruck($array){
        return $this->adresseFT->update($array);
    }
}
