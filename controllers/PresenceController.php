<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOPresence;

class PresenceController extends Controller {

    private $presence;

    public function __construct(){
        parent::__construct();
        $this->presence = new DAOPresence();
    }

    public function getAll(){
        return $this->presence->getAll();
    }

    public function getAllBy($filter){
        return $this->presence->getAllBy($filter);
    }
    public function retrieve($id){
        return $this->presence->retrieve($id);
    }

    public function create($newPresence){
        return $this->presence->create($newPresence);
    }

    public function delete($objet){
        return $this->presence->delete($objet);
    }

    public function updateMe($idPresence,$newValeurs) {
        return $this->presence->updateMe($idPresence,$newValeurs);
    }

    public function update($newValeurs) {
        return $this->presence->update($newValeurs);
    }

    public function theLastOne() {
        return $this->presence->theLastOne();
    }

}
