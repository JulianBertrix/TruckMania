<?php
namespace BWB\Framework\mvc\models;

class FavorisModel {

    private $utilisateurId;
    private $foodtruckId;

    public function __construct($utilisateurId = null, $foodtruckId = null) {
        $this->utilisateurId = $utilisateurId;
        $this->foodtruckId = $foodtruckId;
    }



    /**
     * Get the value of utilisateurId
     */ 
    public function getUtilisateurId()
    {
        return $this->utilisateurId;
    }

    /**
     * Set the value of utilisateurId
     *
     * @return  self
     */ 
    public function setUtilisateurId($utilisateurId)
    {
        $this->utilisateurId = $utilisateurId;

        return $this;
    }

    /**
     * Get the value of foodtruckId
     */ 
    public function getFoodtruckId()
    {
        return $this->foodtruckId;
    }

    /**
     * Set the value of foodtruckId
     *
     * @return  self
     */ 
    public function setFoodtruckId($foodtruckId)
    {
        $this->foodtruckId = $foodtruckId;

        return $this;
    }
}