<?php
namespace BWB\Framework\mvc\models;

class TruckEvenementModel {

    private $myTruck;
    private $myEvent;

    public function __construct() {
    }
    
    

    /**
     * Get the value of myTruck
     */ 
    public function getMyTruck()
    {
        return $this->myTruck;
    }

    /**
     * Set the value of myTruck
     *
     * @return  self
     */ 
    public function setMyTruck($myTruck)
    {
        $this->myTruck = $myTruck;

        return $this;
    }

    /**
     * Get the value of myEvent
     */ 
    public function getMyEvent()
    {
        return $this->myEvent;
    }

    /**
     * Set the value of myEvent
     *
     * @return  self
     */ 
    public function setMyEvent($myEvent)
    {
        $this->myEvent = $myEvent;

        return $this;
    }
}
