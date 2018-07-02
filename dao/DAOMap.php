<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;


class DAOMap extends DAO{

    public function __construct(){
        parent::__construct();
    }

    /**
     * Methode qui prend en argument une adresse et retourne ses coordonnées GPS sous la forme
     * ["latitude" => xxxxx , "longitude" => xxxxxx]
     */

    public function giveMeTheGPS($adresse) {

        $newAdresse = str_replace(" ","+",$adresse);

        if ($stream = fopen('https://maps.googleapis.com/maps/api/geocode/json?address='.$newAdresse.'&key=AIzaSyDd0z6MCPdZ0v5TPvkbB6yWW9dli2vkN3c', 'r')) {
            
            $listeIDsJson = stream_get_contents($stream, -1, 0);
    
            //Conversion en tableau
            $listeIDs = json_decode($listeIDsJson, true);

            var_dump($listeIDs);
    
            fclose($stream);
        }
    }

    public function create($adresse) {
    }

    public function delete($id) {
    }

    public function getAll() {
    }

    public function getAllBy($filter) {
    }

    public function retrieve($id) {
    }
    public function update($id) {
    }
}
