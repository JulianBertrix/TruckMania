<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\dao\DAOFavoris;

class UtilisateurController extends Controller {

    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $dateCreation;
    private $roleId;
    private $adresseId;
    private $foodTruckId;
    private $user;

    public function __construct(){
        parent::__construct();
        $this->user = new DAOUtilisateur();
    }

    public function getAllJSON(){
        $users = $this->user->getAll();
        $listeUserJSON = [];
        foreach ($users as $user) {
            array_push(
                $listeUserJSON,$user->jsonSerialize()
            );
        }
        header("Content-Type: application/json");
        return json_encode($listeUserJSON);
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

    public function retrieveToJson($id){
        header("Content-Type: application/json");
        $retour = $this->user->retrieve($id)->jsonSerialize();
        echo json_encode($retour);
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
        header("Content-Type: text/plain");
        $dataPost = $this->inputPost();
        
        //Modif email et password
        $newData;
        if($dataPost['email'] !== "" && $dataPost['mot_de_passe'] !== ""){
            $newData = array(
                'email' => $dataPost['email'],
                'mot_de_passe' => hash("sha1",$dataPost['mot_de_passe'])
            );
        }else if($dataPost['email'] !== ""){
            $newData = array(
                'email' => $dataPost['email']
            );
        }else if($dataPost['mot_de_passe'] !== ""){
            $newData = array(
                'mot_de_passe' => hash("sha1",$dataPost['mot_de_passe'])
            );
        }
        
        if(count($newData) > 0){
            $tutu = $this->user->updateMe($id, $newData);
        }
        
        //Modif Adresse
        if($dataPost['adresse'] !== ""){
            $adresse = $this->user->retrieve($id)->getAdresseId()->getId();
        
            $newAdresse = array(
                'adresse' => $dataPost['adresse']
            );
            
            (new DAOAdresse())->updateMe($adresse, $newAdresse);
        }
    }

    public function testMe(){
        $this->render('test');
    }

    public function theLastOne() {
        return $this->user->theLastOne();
    }

}
