<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;

require 'CheckURI.php';

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
        
        //var_dump(checkMe($this->security->acceptConnexion(),$_SERVER['REQUEST_URI']));

        $datas = ['listeCat' => (new CategorieController())->getAllCategorie()];

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
