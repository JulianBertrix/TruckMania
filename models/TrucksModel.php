<?php
namespace BWB\Framework\mvc\models;

class TrucksModel {

    private $id;
    private $siret;
    private $nom;
    private $dateCreation;
    private $logo;
    private $categorieId;
    private $moyenne;

<<<<<<< HEAD
    public function __construct() {

=======
    public function __construct($id = null, $siret = null, $nom = null, $logo = null, $categorieId = null, $moyenne = null) {
        $this->id = $id;
        $this->siret = $siret;
        $this->nom = $nom;
        $this->dateCreation = date("Y-m-d H:i:s");
        $this->logo = $logo;
        $this->categorieId = $categorieId;
        $this->moyenne = $moyenne;
>>>>>>> trucks
    }

    // public function __construct($siret, $nom, $logo, $categorieId, $moyenne) {
    //     $this->id = $id;
    //     $this->siret = $siret;
    //     $this->nom = $nom;
    //     $this->dateCreation = date("Y-m-d H:i:s");
    //     $this->logo = $logo;
    //     $this->categorieId = $categorieId;
    //     $this->moyenne = $moyenne;
    // }

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
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set the value of siret
     *
     * @return  self
     */ 
    public function setSiret($siret)
    {
        $this->siret = $siret;

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
     * Get the value of logo
     */ 
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     *
     * @return  self
     */ 
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get the value of categorieId
     */ 
    public function getCategorieId()
    {
        return $this->categorieId;
    }

    /**
     * Set the value of categorieId
     *
     * @return  self
     */ 
    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    /**
     * Get the value of moyenne
     */ 
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * Set the value of moyenne
     *
     * @return  self
     */ 
    public function setMoyenne($moyenne)
    {
        $this->moyenne = $moyenne;

        return $this;
    }
}