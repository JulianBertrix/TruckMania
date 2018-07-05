<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\AvisModel;
use BWB\Framework\mvc\dao\DAOAvis;

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

    public function create($numeroCommande, $foodtruckId, $userId){
        $dataPost = $this->inputPost();
        
        $newAvis = new AvisModel();
        $newAvis->setMessage($dataPost['message']);
        $newAvis->setNote($dataPost['note']);
        $newAvis->setNumeroCommande($numeroCommande);
        $newAvis->setFoodtruckId($foodtruckId);
        $newAvis->setUtilisateurId($userId);
        $obj = $this->avis->create($newAvis);
        echo $obj;

    }

    public function delete($id){
        return $this->avis->delete($id);
    }

    public function updateMe($idAvis,$newValeurs) {
        return $this->avis->updateMe($idAvis,$newValeurs);
    }

    public function update($newValeurs) {
        return $this->avis->update($newValeurs);
    }

    public function theLastOne() {
        return $this->avis->theLastOne();
    }

}
