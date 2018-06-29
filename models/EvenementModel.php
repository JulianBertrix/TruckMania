<?php
namespace BWB\Framework\mvc\models;

use BWB\Framework\mvc\models\AdresseModel;

class EvenementModel {
    private $id;
    private $date_creation;
    private $intitule;
    private $date_debut;
    private $date_fin;
    private $description;
    private $image;
    private $utilisateur_id;
    private $adresse_id;
    private $NombreDeParticipant;

    public function __construct(){
        
    }

    public function to_json(){

        $array = array(
            "id" => $this->id,
            "date_creation" => $this->date_creation,
            "intitule" => $this->intitule,
            "date_debut" => $this->date_debut,
            "date_fin" => $this->date_fin,
            "description" => $this->description,
            "image" => $this->image,
            "adresse_id" => $this->adresse_id->to_json(),
            "NombreDeParticipant" => $this->NombreDeParticipant
        );

        return json_encode($array);
    }

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
     * Get the value of date_creation
     */ 
    public function getDate_creation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_creation
     *
     * @return  self
     */ 
    public function setDate_creation($date_creation)
    {
        $this->date_creation = $date_creation;

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

    /**
     * Get the value of date_debut
     */ 
    public function getDate_debut()
    {
        return $this->date_debut;
    }

    /**
     * Set the value of date_debut
     *
     * @return  self
     */ 
    public function setDate_debut($date_debut)
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    /**
     * Get the value of date_fin
     */ 
    public function getDate_fin()
    {
        return $this->date_fin;
    }

    /**
     * Set the value of date_fin
     *
     * @return  self
     */ 
    public function setDate_fin($date_fin)
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    /**
     * Get the value of adresse_id
     */ 
    public function getAdresse_id()
    {
        return $this->adresse_id;
    }

    /**
     * Set the value of adresse_id
     *
     * @return  self
     */ 
    public function setAdresse_id($adresse_id)
    {
        $this->adresse_id = $adresse_id;

        return $this;
    }

    /**
     * Get the value of utilisateur_id
     */ 
    public function getUtilisateur_id()
    {
        return $this->utilisateur_id;
    }

    /**
     * Set the value of utilisateur_id
     *
     * @return  self
     */ 
    public function setUtilisateur_id($utilisateur_id)
    {
        $this->utilisateur_id = $utilisateur_id;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getNombreDeParticipant()
    {
        return $this->NombreDeParticipant;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setNombreDeParticipant($NombreDeParticipant)
    {
        $this->NombreDeParticipant = $NombreDeParticipant;

        return $this;
    }
}

