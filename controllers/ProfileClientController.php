<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;
use BWB\Framework\mvc\models\AdresseModel;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\dao\DAOPlanning;

require 'CheckURI.php';
/**
 * Description of ProfileClientController
 *
 * @author julianbertrix
 */
class ProfileClientController extends Controller{
    
    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    public function profileClient($id) {

        //CHECH SECURITY

        if(checkMe($this->security->acceptConnexion(),$_SERVER['REQUEST_URI'])){

            //Recup de l'objet User en cours
            $utilisateur = (new DAOUtilisateur())->retrieve($id);

            $favoris = (new FavorisController())->getAllBy(["utilisateur_id" => $utilisateur->getId()]);
            $commande = (new CommandeController())->getAllBy(["utilisateur_id" => $utilisateur->getId()]);
            
            $getCommande = null;
            $listeCommandes = array();
            
            foreach ($commande as $key => $value){
                $getCommande = (new CommandeController)->getFullCommande($value->getNumero());
                array_push($listeCommandes, $getCommande);
            }
            
            $datas = array(
                'infoClient' => $utilisateur,
                'listeFavoris' => $favoris,              
                'listeCommande' => $commande,              
                'fullCommande' => $listeCommandes
            );
            
            $this->render("profileClient", $datas);

        }else{
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/");
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
