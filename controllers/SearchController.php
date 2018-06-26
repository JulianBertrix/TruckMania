<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\controllers\AdresseController;
use BWB\Framework\mvc\models\AdresseModel;
use BWB\Framework\mvc\dao\DAOAdresse;

class SearchController extends Controller {

    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    public function searchPage() {

        //recup des infos du post
        $datasPost = $this->inputPost();

        
        $listAdress = (new AdresseController())->getAll();
        
        $testAdresse1 = (new DAOAdresse())->retrieve(1);
        array_push($listAdress,$testAdresse1);
        $testAdresse2 = (new DAOAdresse())->retrieve(2);
        array_push($listAdress,$testAdresse2);


        $datas = ['listeAdress' => $listAdress];

        $this->render("testAir",$datas);

    }

    //Fonction qui récupère le résultat du formulaire et requete la liste des FT
    public function searchMe($datas){
        $location = $datas['location'];
        // $localLongitude = $datas['longitude'];
        // $localLatitude = $datas['latitude'];
        $dateRequest = $datas['dateRequest'];
        $hourRequest = $datas['heureRequest'];
        $catrequest = $datas['catRequest'];

    }

    //Fonction qui prend en argument 2 objets adresse et calcule la distance entre les 2 et retourne true si inferieure à maxDistance
    public function calculDistance($adresseA,$adresseB,$maxDistance){

        /*
        Description : Calcul de la distance entre 2 points en fonction de leur latitude/longitude
        Auteur : Michaël Niessen (2014)
        Site web : AssemblySys.com
        */

        $point1_lat = $adresseA->getLatitude();
        $point1_long = $adresseA->getLongitude();
        $point2_lat = $adresseB->getLatitude();
        $point2_long = $adresseB->getLongitude();
        $unit = 'km';
        $decimals = 2;

        // Calcul de la distance en degrés
        $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
    
        // Conversion de la distance en degrés à l'unité choisie (kilomètres, milles ou milles nautiques)
        switch($unit) {
            case 'km':
                $distance = $degrees * 111.13384; // 1 degré = 111,13384 km, sur base du diamètre moyen de la Terre (12735 km)
                break;
            case 'mi':
                $distance = $degrees * 69.05482; // 1 degré = 69,05482 milles, sur base du diamètre moyen de la Terre (7913,1 milles)
                break;
            case 'nmi':
                $distance =  $degrees * 59.97662; // 1 degré = 59.97662 milles nautiques, sur base du diamètre moyen de la Terre (6,876.3 milles nautiques)
        }

        return round($distance, $decimals);
        // $distanceFinale =  round($distance, $decimals);

        // if($distanceFinale > $maxDistance){
        //     return false;
        // }else{
        //     return true;
        // }

    }

    public function login() {
        $this->security->generateToken(new DefaultModel());
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/token");
    }

    public function logout() {
        $this->security->deactivate();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/token");
    }

    public function token() {
        var_dump($this->security->acceptConnexion());
    }

}
