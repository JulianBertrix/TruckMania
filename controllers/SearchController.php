<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\AdresseModel;
use BWB\Framework\mvc\dao\DAOPlanning;
use BWB\Framework\mvc\dao\DAOMap;

class SearchController extends Controller {

    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    public function searchPage() {

        //recup des infos du post
        $datasPost = $this->inputPost();

        //Recup des coord GPS
        $datasPost['gps'] = (new DAOMap())->giveMeTheGPS($datasPost['user_input_autocomplete_address']);

        $requestReponse = $this->searchMe($datasPost);

        $datas = ['request' => $requestReponse,'listeCat' => (new CategorieController())->getAllCategorie()];

        $this->render("search",$datas);

    }

    //Fonction qui récupère le résultat du formulaire et requete la liste des FT
    public function searchMe($datas){

        $listeTrucksOK = [];
        
        $adresseObj = new AdresseModel();
        $adresseObj->setLatitude($datas['gps']['lat']);
        $adresseObj->setLongitude($datas['gps']['lng']);

        //Creation de la date au format SQL
        $dateRequest = $datas['dateRequest']." ".$datas['heureRequest'];

        $newDateString = date_format(date_create_from_format('d/m/Y H:i', $dateRequest), 'Y-m-d H:i');

        $catrequest = $datas['catrequest'];

        //Recup des objets plannings
        $listePlanning = (new DAOPlanning())->getAllByDate($newDateString);

        //check si adresse est dans la zone
        foreach($listePlanning as $planning){

            $newAdresse = $planning->getAdresseId();

            if(($this->calculDistance($adresseObj,$newAdresse,10)) === true){
                array_push($listeTrucksOK, $planning);
            }

        }

        return $listeTrucksOK;
    }

    //Fonction qui prend en argument 2 objets adresse et calcule la distance entre les 2 et retourne true si inferieure à maxDistance en Km
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

        //return round($distance, $decimals);

        $distanceFinale = round($distance, $decimals);

        if($distanceFinale > $maxDistance){
            return false;
        }else{
            return true;
        }

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
