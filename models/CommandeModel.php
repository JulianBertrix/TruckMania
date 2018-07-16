<?php
namespace BWB\Framework\mvc\models;
use JsonSerializable;

class CommandeModel implements JsonSerializable{

    private $numero;
    private $dateCommande;
    private $utilisateurId;
    private $foodtruckId;
    private $avisId;
    private $total;
    /**
     *
     * @var PanierModel
     */
    private $panier;

    public function __construct() {
    }

    public function jsonSerialize() {
        return [
            'numero' => $this->numero,
            'dateCommande' => $this->dateCommande,
            'utilisateurId' => $this->utilisateurId,
            'avisId' => $this->avisId,
            'total' => $this->total
        ];
    }
    /**
     * Get the value of id
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of dateCommande
     */ 
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * Set the value of dateCommande
     *
     * @return  self
     */ 
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;

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
     * Get the value of id
     */ 
    public function getAvisId()
    {
        return $this->avisId;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setAvisId($avisId)
    {
        $this->avisId = $avisId;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}