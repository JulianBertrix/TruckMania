<?php
namespace BWB\Framework\mvc\models;

class PlanningModel implements JsonSerializable{

    private $foodtruckId;
    private $adresseId;
    private $dateDebut;
    private $dateFin;

    public function __construct() {
    }

    public function jsonSerialize() {
        return [
            'id' => $this->foodtruckId,
            'events' => [
                'title' => $this->intitule,
                'start' => $this->date_debut,
                'end' => $this->date_fin,
                'color' => 'yellow', 
                'textColor' => 'black'
                ],
            'description' => $this->description,
            'NombreDeParticipant' => $this->NombreDeParticipant,
            'adresse' => $this->adresse_id->jsonSerialize()
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
}