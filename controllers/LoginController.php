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
class LoginController extends Controller {

    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    public function checkUser() {

        //recup des infos du post
        $datasPost = $this->inputPost();

        //Check datas en BDD
        $utilisateur = (new DAOUtilisateur())->checkCredits($datasPost['login'],$datasPost['password']);

        if($utilisateur !== false){ //User OK -> generation du token
            $this->security->generateToken($utilisateur);
        }

        //Retourne la page en cours
        header('Content-Type: text/plain');
        echo "http://".$_SERVER['SERVER_NAME'] . "/";
        
    }

    public function login() {
    }

    public function logout() {
        $this->security->deactivate();
        header('Content-Type: text/plain');
        echo "http://".$_SERVER['SERVER_NAME'] . "/";
    }

    public function token() {
        var_dump($this->security->acceptConnexion());
    }

}
