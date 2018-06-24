<?php
namespace BWB\Framework\mvc\models;

class PresenceModel {

    private $planningId;
    private $foodtruckId;
    private $adresseId;

    public function __construct($planningId, $foodtruckId, $adresseId) {
        $this->planningId = $planningId;
        $this->foodtruckId = $foodtruckId;
        $this->adresseId = $adresseId;
    }

    /**
     * Get the value of planningId
     */ 
    public function getPlanningId()
    {
        return $this->planningId;
    }

    /**
     * Set the value of planningId
     *
     * @return  self
     */ 
    public function setPlanningId($planningId)
    {
        $this->planningId = $planningId;

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

    /**
     * Get the value of adresseId
     */ 
    public function getAdresseId()
    {
        return $this->adresseId;
    }

    /**
     * Set the value of adresseId
     *
     * @return  self
     */ 
    public function setAdresseId($adresseId)
    {
        $this->adresseId = $adresseId;

        return $this;
    }
}