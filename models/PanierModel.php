<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

/**
 * Description of PanierModel
 *
 * @author julianbertrix
 */
class PanierModel {
    private $numeroCommande;
    private $platId;
    private $quantite;
    
    /**
     *
     * @var array
     */
    private $plats;
    
    
    public function __construct($numeroCommande = null, $platId = null, $quantite = null) {
        $this->numeroCommande = $numeroCommande;
        $this->platId = $platId;
        $this->quantite = $quantite;
    }
    
    public function getNumeroCommande()
    {
        return $this->numeroCommande;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setNumeroCommande($numeroCommande)
    {
        $this->numeroCommande = $numeroCommande;

        return $this;
    }
    
    public function getPlatId()
    {
        return $this->platId;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setPlatId($platId)
    {
        $this->platId = $platId;

        return $this;
    }
    
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }
}
