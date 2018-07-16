<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\models\CategorieModel;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;
use BWB\Framework\mvc\dao\DAOCategorie;
use BWB\Framework\mvc\dao\DAOCommande;
use BWB\Framework\mvc\dao\DAOEvenement;
require 'CheckURI.php';
use BWB\Framework\mvc\controllers\UtilisateurController;
use BWB\Framework\mvc\controllers\TrucksController;
use BWB\Framework\mvc\controllers\EvenementController;
use BWB\Framework\mvc\controllers\CommandeController;

class AdminController extends Controller{

    public function __construct(){
        parent::__construct();
        $this->securityLoader();
    }

    public function adminPage($partie){
        
        //CHECH SECURITY
        if(checkMe($this->security->acceptConnexion(),$_SERVER['REQUEST_URI'])){
        switch ($partie){
            case "trucks":
            $this->trucksPage();
            break;
            case "users":
            $this->utilisateursPage();
            break;
            case "commande":
            $this->commandePage();
            break;
            case "evenement":
            $this->evenementPage();
            break;
        }

        }else{
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/");
        }
    }

    public function trucksPage(){
        $trucks = (new DAOTrucks())->getAll();
    
        $dataTruck = array(
            'listeTrucks'=> $trucks,
        );
        
        $this->render('admin/admin-page',$dataTruck);
    }

    public function utilisateursPage(){
        $utilisateurs = (new DAOUtilisateur())->getAll();

        $dataUtilisateur = array(
            'listeUsers' => $utilisateurs
        );

        $this->render('admin/admin-page',$dataUtilisateur);
    }

    public function commandePage(){
        $commandes = (new DAOCommande())->getAll();

        $dataCommande = array(
            'listeCommande' => $commandes
        );

        $this->render('admin/admin-page',$dataCommande);
    }

    public function evenementPage(){
        $evenements = (new DAOEvenement())->getAll();

        $dataEvenement = array(
            'listeEvenement' => $evenements
        );

        $this->render('admin/admin-page',$dataEvenement);
    }

}

