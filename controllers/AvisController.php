<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\AvisModel;
use BWB\Framework\mvc\dao\DAOAvis;
use BWB\Framework\mvc\controllers\CommandeController;
use BWB\Framework\mvc\models\CommandeModel;

class AvisController extends Controller {

    private $avis;

    public function __construct(){
        parent::__construct();
        $this->avis = new DAOAvis();
    }

    public function getAll(){
        return $this->avis->getAll();
    }

    public function getAllBy($filter){
        return $this->avis->getAllBy($filter);
    }
    
    public function retrieve($id){
        return $this->avis->retrieve($id);
    }

    public function create($avis){
        return $this->avis->create($avis);
    }

    public function delete($id){
        return $this->avis->delete($id);
    }

    public function updateMe($idAvis) {
        $dataPost = $this->inputPut();
        
        $newValeurs = array(
            "date_ajout" => date("Y-m-d H:i"),
            "message" => $dataPost['message'],
            "note" => $dataPost['note']
        );
        
        $this->avis->updateMe($idAvis,$newValeurs);
    }

    public function update($newValeurs) {
        return $this->avis->update($newValeurs);
    }

    public function theLastOne() {
        return $this->avis->theLastOne();
    }

}
