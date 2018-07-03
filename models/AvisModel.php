<?php
namespace BWB\Framework\mvc\models;

class AvisModel {

    private $id;
    private $dateAjout;
    private $message;
    private $note;
    private $numeroCommande;
    private $foodtruckId;
    private $utilisateurId;
    
    public function __construct() {
        
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
     * Get the value of dateAjout
     */ 
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Set the value of dateAjout
     *
     * @return  self
     */ 
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }
    
    /**
     * Get the value of id
     */ 
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

}