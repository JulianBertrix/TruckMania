<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\models\PlatModel;
use BWB\Framework\mvc\dao\DAOPlat;
use BWB\Framework\mvc\models\CommandeModel;
use BWB\Framework\mvc\dao\DAOCommande;
use BWB\Framework\mvc\models\AvisModel;
use BWB\Framework\mvc\dao\DAOAvis;
/**
 * Description of FoodTruckProfileController
 *
 * @author julianbertrix
 */

require 'CheckURI.php';

class FoodTruckProfileController extends Controller{
    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    public function vueProfile($id) {

        if(checkMe($this->security->acceptConnexion(),$_SERVER['REQUEST_URI'])){
            $truck = (new DAOTrucks())->retrieve($id);
            //$id = $truck->getId();
            $nom = $truck->getNom();
            $logo = $truck->getLogo();
            $moyenne = $truck->getMoyenne();
            
            $categorie = $truck->getCategorieId()->getIntitule();
            
            $carte = array();
            $plats = (new DAOPlat())->getAllBy(['foodtruck_id' => $id]);
            
            foreach ($plats as $plat){
                array_push($carte, $plat->getNom());
            }
            
            $listeAvis = array();
            $listeNote = array();
            $commande = (new DAOCommande())->getAllBy(['foodtruck_id' => $id]);
            
            foreach ($commande as $value){
                array_push($listeAvis, $value->getAvisId()->getMessage());
                array_push($listeNote, $value->getAvisId()->getNote());
            }
            
            $datas = array(
                'id' => $id,
                'nom' => $nom,
                'logo' => $logo,
                'categorie' => $categorie,
                'carte' => $carte,
                'listeAvis' => $listeAvis,
                'listeNote' => $listeNote,
                'moyenne' => $moyenne
            );
        
            $this->render('foodtruckProfile', $datas);

        }else{
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/");
        }   
        
    }
}
