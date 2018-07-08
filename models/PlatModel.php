<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;
use JsonSerializable;
/**
 * Description of PlatModel
 *
 * @author julianbertrix
 */
class PlatModel implements JsonSerializable{
    private $id;
    private $nom;
    private $description;
    private $prix;
    private $image;
    private $dateCreation;
    private $foodtruckId;

    public function __construct($id = null, $nom = null, $description = null, $prix = null, $image = null, $foodtruckId = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->image = $image;
        $this->dateCreation = date("Y-m-d H:i:s");
        $this->foodtruckId = $foodtruckId;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'description' => $this->description,
            'prix' => $this->prix,
            'image' => $this->image,
            'dateCreation' => $this->dateCreation
        ];
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of siret
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of logo
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of logo
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of categorieId
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of categorieId
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */ 
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */ 
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
    
    /**
     * Get the value of moyenne
     */ 
    public function getFoodtruckId()
    {
        return $this->foodtruckId;
    }

    /**
     * Set the value of moyenne
     *
     * @return  self
     */ 
    public function setFoodtruckId($foodtruckId)
    {
        $this->foodtruckId = $foodtruckId;

        return $this;
    }
}