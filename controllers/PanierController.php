<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOPanier;
/**
 * Description of PanierController
 *
 * @author julianbertrix
 */
class PanierController extends Controller{
    private $panier;

    function __construct(){
        parent::__construct();
        //Creation d'un DAOPanier
        $this->panier = new DAOPanier();
    }
    
    public function getAllPanier() {
        return $this->panier->getAll();
    }
    
    public function getPanier($objet){
        return $this->panier->retrieve($objet);
    }
    
    public function getAllPanierBy($filter){
        return $this->panier->getAllBy($filter);
    }
    
    public function addPanier($array){
        return $this->panier->create($array);
    }
    
    public function deletePanier($objet){
        return $this->panier->delete($objet);
    }
    
    public function updatePanier($array){
        return $this->panier->update($array);
    }
}
