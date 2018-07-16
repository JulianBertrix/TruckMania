<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;

class DevController extends Controller {

    private $login;

    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    public function switchClient() {
        $this->security->deactivate();
        $utilisateur = (new DAOUtilisateur())->retrieve(102);
        $this->security->generateToken($utilisateur);
        header("Location: http://" . $_SERVER['SERVER_NAME']. "/");
    }

    public function switchAdmin() {
        $this->security->deactivate();
        $utilisateur = (new DAOUtilisateur())->retrieve(101);
        $this->security->generateToken($utilisateur);
        header("Location: http://" . $_SERVER['SERVER_NAME']. "/");
    }

    public function switchPro() {
        $this->security->deactivate();
        $utilisateur = (new DAOUtilisateur())->retrieve(104);
        $this->security->generateToken($utilisateur);
        header("Location: http://" . $_SERVER['SERVER_NAME']. "/");
    }

    public function switchTruck() {
        $this->security->deactivate();
        $utilisateur = (new DAOUtilisateur())->retrieve(103);
        $this->security->generateToken($utilisateur);
        header("Location: http://" . $_SERVER['SERVER_NAME']. "/");
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
