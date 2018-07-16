<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

/**
 * Description of CategorieModel
 *
 * @author julianbertrix
 */
class CategorieModel {
    private $id;
    private $intitule;
    
    public function __construct($id = null, $intitule = null) {
        $this->id = $id;
        $this->intitule = $intitule;
    }
    
    //Accesseurs
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of siret
     */ 
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set the value of siret
     *
     * @return  self
     */ 
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

}
