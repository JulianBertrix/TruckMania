<?php
namespace BWB\Framework\mvc\models;
use BWB\Framework\mvc\UserInterface;

class UtilisateurModel implements UserInterface{

    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;
    private $dateCreation;
    private $roleId;
    private $adresseId;
    private $foodTruckId;

    public function __construct() {    
    }

    public function getPassword() {
        return $this->motDePasse;
    }

    public function getRoles() {
        return [
            $this->roleId->getNom()
        ];
        
    }

    public function getUsername() {
        return 
        [
            $this->id,
            $this->prenom,
            $this->foodTruckId->getId()
        ];
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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of motDePasse
     */ 
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * Set the value of motDePasse
     *
     * @return  self
     */ 
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

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
     * Get the value of roleId
     */ 
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set the value of roleId
     *
     * @return  self
     */ 
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;

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
     * Get the value of foodTruckId
     */ 
    public function getFoodTruckId()
    {
        return $this->foodTruckId;
    }

    /**
     * Set the value of foodTruckId
     *
     * @return  self
     */ 
    public function setFoodTruckId($foodTruckId)
    {
        $this->foodTruckId = $foodTruckId;

        return $this;
    }
}