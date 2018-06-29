<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;

class UtilisateurController extends Controller {

    private $user;

    public function __construct(){
        parent::__construct();
        $this->user = new DAOUtilisateur();
    }

    public function getAll(){
        return $this->user->getAll();
    }

    public function getAllBy($filter){
        return $this->user->getAllBy($filter);
    }
    public function retrieve($id){
        return $this->user->retrieve($id);
    }

    public function create($newUser){
        return $this->user->create($newUser);
    }

    public function delete($id){
        return $this->user->delete($id);
    }

    public function updateMe($idUser,$newValeurs) {
        return $this->user->updateMe($idUser,$newValeurs);
    }

    public function update($id) {
        header("Content-Type: application/json");
        $dataPost = $this->inputPost();
        
        $newUser = new UtilisateurModel();
        $newUser->setId($id);
        $newUser->setNom($dataPost['nom']);
        $newUser->setPrenom($dataPost['prenom']);
        $newUser->setMotDePasse($dataPost['mot_de_passe']);
        $newUser->setEmail($dataPost['email']);
        
        $this->user->update($newUser);
    }


    public function testMe(){
        $this->render('test');
    }

    public function theLastOne() {
        return $this->user->theLastOne();
    }

}
