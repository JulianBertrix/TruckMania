<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewController
 *
 * @author loic
 */
class HomeController extends Controller {

    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    public function homePage() {

        //recup des 5 derniers FT inscrits
        $newTrucks = (new TrucksController())->getTrucksFive();

        //recup des 5 prochians evenements
        $newEvts = (new EvenementController())->getLastFive();

        $datas = ['lastFiveEvts' => $newEvts, 'lastFiveTrucks' => $newTrucks, 'listeCat' => (new CategorieController())->getAllCategorie()];

        $this->render("home",$datas);

    }

    public function login() {
        $this->security->generateToken(new UtilisateurModel());
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
