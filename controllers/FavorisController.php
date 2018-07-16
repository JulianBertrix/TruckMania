<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOFavoris;
use BWB\Framework\mvc\models\FavorisModel;

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

    public function create($userId, $foodtruckId){
               
        $newFavoris = new FavorisModel($userId, $foodtruckId);
        
        $obj = $this->favoris->create($newFavoris);
        echo $obj;
    }

    public function delete($userId, $foodtruckId){
        
        $objet = new FavorisModel($userId, $foodtruckId);
        
        $obj = $this->favoris->delete($objet);
        echo $obj;
    }

    public function updateMe($objet,$newValeurs) {
        return $this->favoris->updateMe($objet,$newValeurs);
    }

    public function update($newValeurs) {
        return $this->favoris->update($newValeurs);
    }

}
