<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;


class DAOMap extends DAO{

    public function __construct(){
        parent::__construct();
    }

    /**
     * Methode qui prend en argument une adresse et retourne ses coordonnées GPS sous la forme
     * ["lat" => xxxxx , "lng" => xxxxxx]
     */

    public function giveMeTheGPS($adresse) {

        $coord;

        $newAdresse = str_replace(" ","+",$adresse);

        if ($stream = fopen('https://maps.googleapis.com/maps/api/geocode/json?address='.$newAdresse.'&key=AIzaSyDd0z6MCPdZ0v5TPvkbB6yWW9dli2vkN3c', 'r')) {
            
            $resultJson = stream_get_contents($stream, -1, 0);
    
            //Conversion en tableau
            $result = json_decode($resultJson, true);

            fclose($stream);

            $coord = $result["results"][0]["geometry"]["location"];
        }

        return $coord;
    }

    /**
     * Methode qui prend en argument des coordonnées GPS et retourne l'adresse correspondante sous la forme
     * d'une string
     */
    public function giveMeTheAdresse($lat,$lon) {

        $coord = $lat.",".$lon;

        $adresse = "";

        if ($stream = fopen('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$coord.'&key=AIzaSyDd0z6MCPdZ0v5TPvkbB6yWW9dli2vkN3c', 'r')) {
            
            $resultJson = stream_get_contents($stream, -1, 0);

    
            //Conversion en tableau
            $result = json_decode($resultJson, true);

            fclose($stream);

            $adresse = $result["results"][0]["formatted_address"];

            //Supression du ", France" de l'adresse
            $adresse = str_replace(", France","",$adresse);

        }

        return $adresse;
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
