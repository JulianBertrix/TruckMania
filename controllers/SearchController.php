<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;

class SearchController extends Controller {

    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    public function searchPage() {

        //recup des infos du post


        //$datas = ['listeCat' => (new CategorieController())->getAllCategorie()];

        $this->render("search");

    }

    //Fonction qui récupère le résultat du formulaire et requete la liste des FT
    public function searchMe($datas){

        $localLongitude = $datas['longitude'];
        $localLatitude = $datas['latitude'];
        $dateRequest = $datas['dateRequest'];
        $hourRequest = $datas['heureRequest'];
        $catrequest = $datas['catRequest'];

        
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
