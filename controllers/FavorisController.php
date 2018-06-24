<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOFavoris;

class FavorisController extends Controller {

    private $favoris;

    public function __construct(){
        parent::__construct();
        $this->favoris = new DAOFavoris();
    }

    public function getAll(){
        return $this->favoris->getAll();
    }

    public function getAllBy($filter){
        return $this->favoris->getAllBy($filter);
    }
    public function retrieve($objet){
        return $this->favoris->retrieve($objet);
    }

    public function create($newFavoris){
        return $this->favoris->create($newFavoris);
    }

    public function delete($objet){
        return $this->favoris->delete($objet);
    }

    public function updateMe($objet,$newValeurs) {
        return $this->favoris->updateMe($objet,$newValeurs);
    }

    public function update($newValeurs) {
        return $this->favoris->update($newValeurs);
    }

}
