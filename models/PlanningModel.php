<?php
namespace BWB\Framework\mvc\models;
use JsonSerializable;

class PlanningModel implements JsonSerializable{

    private $foodtruckId;
    private $adresseId;
    private $dateDebut;
    private $dateFin;
    private $intitule;


    public function __construct() {
    }

    public function jsonSerialize() {
        return [
            'id' => [
                'foodtruck_id' => $this->foodtruckId->getId(),
                'date_debut' => $this->dateDebut,
                'date_fin' => $this->dateFin,
            ],
            'title' => $this->intitule,
            'start' => $this->dateDebut,
            'end' => $this->dateFin,
            'adresse' => $this->adresseId->jsonSerialize()
            ];
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

    /**
     * Get the value of dateDebut
     */ 
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set the value of dateDebut
     *
     * @return  self
     */ 
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get the value of dateFin
     */ 
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin
     *
     * @return  self
     */ 
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get the value of intitule
     */ 
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set the value of intitule
     *
     * @return  self
     */ 
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }
}