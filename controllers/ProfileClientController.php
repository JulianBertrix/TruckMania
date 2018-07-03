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

    public function profileClient() {
        $favoris = (new FavorisController())->getAllBy(["utilisateur_id" => 1]);
        $commande = (new CommandeController())->getAllBy(["utilisateur_id" => 1]);
        $commandeEnCours = (new CommandeController())->getAllBy(["utilisateur_id" => 1]);

        $dateCommande = null;
        $foodtruck = null;
        $foodtruckId = null;
        $total = null;
        $numeroCommande = null;
        
        foreach ($commande as $key => $value){
            if($value->getDateCommande() <= date("Y-m-d H:i:s")){
                $dateCommande = $value->getDateCommande(); 
                $foodtruck = $value->getFoodtruckId()->getNom();
                $foodtruckId = $value->getFoodtruckId()->getId();
                $total = $value->getTotal();
                
                $panier = (new PanierController())->getAllPanierBy(["commande_numero" => $value->getNumero()]); 
                $plat = array();
                $quantite = array();
                
                foreach ($panier as $key => $val){
                    $numeroCommande = $val->getNumeroCommande()->getNumero();
                    if ($value->getNumero() === $numeroCommande){
                        array_push($plat, $val->getPlatId()->getNom());
                        array_push($quantite, $val->getQuantite());
                    }
                } 
            }
        }
        
        $dateCommandeEnCours = null;
        $foodtruckEnCours = null;
        $totalEnCours = null;
        
        $platEnCours = null;
        $quantiteEnCours = null;
        
        foreach ($commandeEnCours as $key => $value){
            if($value->getDateCommande() >= date("Y-m-d H:i:s")){
                $dateCommandeEnCours = $value->getDateCommande(); 
                $foodtruckEnCours = $value->getFoodtruckId()->getNom();
                $totalEnCours = $value->getTotal();
                
                $panierEnCours = (new PanierController())->getAllPanierBy(["commande_numero" => $value->getNumero()]); 
                $platEnCours = array();
                $quantiteEnCours = array();
                
                foreach ($panierEnCours as $key => $val){
                    if ($value->getNumero() === $val->getNumeroCommande()->getNumero()){
                        array_push($platEnCours, $val->getPlatId()->getNom());
                        array_push($quantiteEnCours, $val->getQuantite());
                    }
                } 
            }
        }

        $datas = array(
            'infoClient' => (new UtilisateurController())->retrieve(1),
            
            'foodtruckId' => $foodtruckId,
            
            'listeFavoris' => $favoris,
            
            'numeroCommande' => $numeroCommande,
            'listeCommande' => $commande,
            'dateCommande' => $dateCommande,
            'foodtruck' => $foodtruck,
            'listePlat' => $plat,
            'listeQuantite' => $quantite,
            'total' => $total,
            
            'listeCommandeEnCours' => $commandeEnCours,
            'dateCommandeEnCours' => $dateCommandeEnCours,
            'foodtruckEnCours' => $foodtruckEnCours,
            'listePlatEnCours' => $platEnCours,
            'listeQuantiteEnCours' => $quantiteEnCours,
            'totalEnCours' => $totalEnCours
        );
        
        $this->render("profileClient", $datas);
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
