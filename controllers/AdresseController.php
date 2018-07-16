<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\dao\DAOMap;

class AdresseController extends Controller {

    private $adresse;

    public function __construct(){
        parent::__construct();
        $this->adresse = new DAOAdresse();
    }

    public function getAll(){
        return $this->adresse->getAll();
    }

    public function getAllBy($filter){
        return $this->adresse->getAllBy($filter);
    }
    public function retrieve($id){
        return $this->adresse->retrieve($id);
    }

    public function create($newAdresse){
        return $this->adresse->create($newAdresse);
    }

    public function delete($id){
        return $this->adresse->delete($id);
    }

    public function updateMe($idAdresse,$newValeurs) {
        return $this->adresse->updateMe($idAdresse,$newValeurs);
    }

    public function update($id) {

        //Recup datas du Post
        $dataPost = $this->inputPost();

        //Nouvelle adresse
        $newAdresse = $dataPost['adresse'];

        //Recup des coord GPS ous la forme ["lat" => xxxxx , "lng" => xxxxxx]
        $coords = (new DAOMap())->giveMeTheGPS($newAdresse);

        //Tableau de modifs
        $modifs = [
            "adresse" => $newAdresse,
            "latitude" => $coords['lat'],
            "longitude" => $coords['lng']
        ];
        
        //Update
        $result = $this->adresse->updateMe($id,$modifs);

        //Nouvelle adresse pour map
        $newMap = "https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=300x300&maptype=roadmap
        &markers=color:red%7Clabel:C%7C".$coords['lat'].",".$coords['lng']."&key=AIzaSyDd0z6MCPdZ0v5TPvkbB6yWW9dli2vkN3c";

        header('Content-Type: text/plain');
        echo $newMap;
    }

    public function theLastOne() {
        return $this->adresse->theLastOne();
    }

}
