<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\AdresseModel;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\models\PlanningModel;
use BWB\Framework\mvc\dao\DAOPlanning;
use BWB\Framework\mvc\dao\DAOCategorie;
use BWB\Framework\mvc\dao\DAOMap;

class SearchController extends Controller {

    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    public function searchPage() {

        //recup des infos du post
        $datasPost = $this->inputPost();

        if(isset($datasPost['user_input_autocomplete_address'])){

            //Recup des coord GPS
            $datasPost['gps'] = (new DAOMap())->giveMeTheGPS($datasPost['user_input_autocomplete_address']);


        }else{
            $datasPost['gps'] = (new DAOMap())->giveMeTheGPS("");
            $datasPost['catrequest'] = "Toutes les catégories";
            $datasPost['dateRequest'] = "";
            $datasPost['heureRequest'] = "12:00";
        }

        $requestReponse = $this->searchMe($datasPost);
        
        $datas = ['request' => $requestReponse,'listeCat' => (new CategorieController())->getAllCategorie()];

        $this->render("search",$datas);

    }

    //Fonction qui récupère le résultat du formulaire et requete la liste des FT
    public function searchMe($datas){

        //Var activée si pas de resultats avec date et/ou avec localisation
        $yaBon = "OK";
        
        $adresseObj = new AdresseModel();
        $adresseObj->setLatitude($datas['gps']['lat']);
        $adresseObj->setLongitude($datas['gps']['lng']);

        //Check et creation de la date au format SQL
        if($datas['dateRequest'] !== "" AND $datas['heureRequest'] !== ""){
            $dateRequest = $datas['dateRequest']." ".$datas['heureRequest'];
            $newDateString = date_format(date_create_from_format('d/m/Y H:i', $dateRequest), 'Y-m-d H:i');
        }else if($datas['dateRequest'] !== ""){
            $dateRequest = $datas['dateRequest']." ".date("H:i:s");
            $newDateString = date_format(date_create_from_format('d/m/Y H:i', $dateRequest), 'Y-m-d H:i');
        }else if($datas['heureRequest'] !== ""){
            $newDateString = date("Y-m-d")." ".$datas['heureRequest'];
        }else{
            $newDateString = date("Y-m-d H:i");
        }

        //recherche des planning correspondant avec la date
        $listePlanningByDate = (new DAOPlanning())->getAllByDate($newDateString);

        //Control du nb de reponses
        if(count($listePlanningByDate) > 0){

            $listePlanningZone = [];

            //check si adresse est dans la zone
            foreach($listePlanningByDate as $PlanningByDate){

                $newAdresse = $PlanningByDate->getAdresseId();

                if(($this->calculDistance($adresseObj,$newAdresse,20)) === true){
                    array_push($listePlanningZone, $PlanningByDate);
                }

            }

            //Control du nb de reponses
            if(count($listePlanningZone) > 0){

                $listePlanningFinal = [];

                var_dump($listePlanningZone);

                //Vérifie si liste des FT correspondent à la catégorie si elle est spécifiée
                if($datas['catrequest'] !== "Toutes les catégories"){
                    foreach($listePlanningZone as $PlanningZone){
                        if(($PlanningZone->getFoodtruck_id()->getCategorieId()->getIntitule()) === $catrequest){
                            array_push($listePlanningFinal,$PlanningZone);
                        }
                    }

                    //Control du nb de reponses
                    if(count($listeTrucksFinal) === 0){

                        $listePlanningFinal = $listePlanningZone; //Pas de FT pour cette categorie, on retourne ttes les cat + message

                        $yaBon = "Pas la cat";
                    }

                }else{  //Toutes les cat

                    $listePlanningFinal = $listePlanningZone;
                }
            
            }else{  //Pas d'adresse dans la zone, carte la France entière + message
                $listePlanningFinal = (new DAOPlanning())->getTrucksFromPlanning();
                $yaBon = "Pas dans zone";
            }
  
        }else{ //Pas de FT dispos à la date

            $listePlanningFinal = (new DAOPlanning())->getTrucksFromPlanning();
            $yaBon = "Pas dans date";

        }

        // var_dump($listeTrucksFinal);
        var_dump($yaBon);
        
        return $listePlanningFinal;
        
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
