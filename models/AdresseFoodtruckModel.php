<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

/**
 * Description of AdresseFoodtruckModel
 *
 * @author julianbertrix
 */
class AdresseFoodtruckModel {
    private $foodtruckId;
    private $adresseId;
    private $intitule;
    
    public function __construct($foodtruckId = null, $adresseId = null, $intitule = null) {
        $this->foodtruckId = $foodtruckId;
        $this->adresseId = $adresseId;
        $this->intitule = $intitule;
    }
    
    public function getFoodtruckId()
    {
        return $this->foodtruckId;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setFoodtruckId($foodtruckId)
    {
        $this->foodtruckId = $foodtruckId;

        return $this;
    }
    
    public function getAdresseId()
    {
        return $this->adresseId;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setAdresseId($adresseId)
    {
        $this->adresseId = $adresseId;

        return $this;
    }
    
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }
}
