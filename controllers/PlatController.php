<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;

use \BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\PlatModel;
use BWB\Framework\mvc\dao\DAOPlat;

/**
 * Description of PlatController
 *
 * @author julianbertrix
 */
class PlatController extends Controller {
    private $plat;

    function __construct(){
        parent::__construct();
        //Creation d'un DAOPlat
        $this->plat = new DAOPlat();
    }
    
    public function deletePlat($id){
        $this->plat->delete($id);
    }
    
    public function updatePlat($idPlat){

        //POST
        $dataPost = $this->inputPost();

        //Gestion image
            //recup de l'image dans BDD
            $oldImage = $this->plat->retrieve($idPlat)->getImage();

            if(isset($_FILES['file']['name'])){
                $newPlat = new PlatModel($idPlat,$dataPost['intitule'],$dataPost['description'],$prix,$_FILES['file']['name'],null);
                move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__). "/assets/img/plats/".$_FILES["file"]["name"]);
            }else{
                $newPlat = new PlatModel($idPlat,$dataPost['intitule'],$dataPost['description'],$prix,$oldImage,null);
            }

        //gestion du prix, enleve €
        $prix = str_replace(" €","",$dataPost['prix']);

        
        
        echo $this->plat->update($newPlat);
        
    }
    
    public function addPlat($idTruck){

        //POST
        $dataPost = $this->inputPost();

        //Gestion image
        if(isset($_FILES['file']['name'])){
            $image = $_FILES['file']['name'];
        }else{
            $image = 'defaultPlat.jpg';
        }

        $newPlat = new PlatModel(null,$dataPost['intitule'],$dataPost['description'],$dataPost['prix'],$image,$idTruck);
        move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__). "/assets/img/plats/".$_FILES["file"]["name"]);
        echo $this->plat->create($newPlat);

    }
    
    public function getPlat($id){
        return $this->plat->retrieve($id);
    }
    
    public function getAllPlatsBy($idTruck){

        $listePlatsObj = $this->plat->getAllBy(['foodtruck_id' => $idTruck]);
        $listePlats = [];

        foreach($listePlatsObj as $plat){
            array_push($listePlats,$plat->jsonSerialize());
        };

        echo json_encode($listePlats);
    }
    
    public function getAllPlats(){
        return $this->plat->getAll();
    }
    
    public function testMe(){
        $this->render("test");
    }
}
