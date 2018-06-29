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
        $this->modifData(1);
        $favoris = (new FavorisController())->getAllBy(["utilisateur_id" => 1]);
        
        foreach ($favoris as $key => $truck){
            $presence = (new \BWB\Framework\mvc\dao\DAOPresence())->getAllBy(['foodtruck_id' => $truck->getFoodtruckId()->getId()]);
            $dateDebut = array();
            $adresse = array();
            $dateFin = array();

            foreach ($presence as $key => $value){
                if ($value->getFoodtruckId()->getId() === $truck->getFoodtruckId()->getId()){
                    array_push($adresse, $value->getAdresseId()->getAdresse());                                       
                    array_push($dateDebut, $value->getPlanningId()->getDateDebut());                                       
                    array_push($dateFin, $value->getPlanningId()->getDateFin());
                }
            }
        }
        
        $commande = (new CommandeController())->getAllBy(["utilisateur_id" => 1]);
        $commandeEnCours = (new CommandeController())->getAllBy(["utilisateur_id" => 1]);
        
        $dateCommandeEnCours;
        $foodtruckEnCours;
        $totalEnCours;
        
        $dateCommande;
        $foodtruck;
        $total;
        
        foreach ($commande as $key => $value){
            if($value->getDateCommande() <= date("Y-m-d H:i:s")){
                $dateCommande = $value->getDateCommande(); 
                $foodtruck = $value->getFoodtruckId()->getNom();
                $total = $value->getTotal();
                
                $panier = (new PanierController())->getAllPanierBy(["commande_numero" => $value->getNumero()]); 
                $plat = array();
                $quantite = array();
                
                foreach ($panier as $key => $val){
                    if ($value->getNumero() === $val->getNumeroCommande()->getNumero()){
                        array_push($plat, $val->getPlatId()->getNom());
                        array_push($quantite, $val->getQuantite());
                    }
                } 
            }
        }
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
            
            'listeFavoris' => $favoris,
            'listeAdresse' => $adresse,
            'listeDateDebut' => $dateDebut,
            'listeDateFin' => $dateFin,
            
            'listeCommandeEnCours' => $commandeEnCours,
            'dateCommandeEnCours' => $dateCommandeEnCours,
            'foodtruckEnCours' => $foodtruckEnCours,
            'listePlatEnCours' => $platEnCours,
            'listeQuantiteEnCours' => $quantiteEnCours,
            'totalEnCours' => $totalEnCours,
            
            'listeCommande' => $commande,
            'dateCommande' => $dateCommande,
            'foodtruck' => $foodtruck,
            'listePlat' => $plat,
            'listeQuantite' => $quantite,
            'total' => $total
            
            //'applyModif' => $this->modifData()

        );
        
        $this->render("profileClient", $datas);
    }
    
    public function modifData($id){
        $post = $this->inputPost();
        $newData = array();
        
        //$user = (new UtilisateurController())->retrieve(1);
        //Modification de l'utilisateur
        $modifUser = new UtilisateurModel();
        $modifUser->setId($id);
        $modifUser->setEmail($post['email']);
        //$modifUser->setMotDePasse($post['mot_de_passe']);
        $majUser = (new DAOUtilisateur())->update($modifUser->getId(), $modifUser);
        var_dump($majUser);
        array_push($newData, $majUser);
        
        
        //$adresse = $user->getAdresseId();
        //var_dump($adresse);
        

        //Modification de l'adresse
        //$newAdresse = new AdresseModel();
        //$newAdresse->setAdresse($post['adresse']);
        //$newAdresse = $adresse->setLatitude();
        //$newAdresse = $adresse->setLongitude();

        //MAJ de l'adresse
        //$majAdresse = (new DAOAdresse())->update($adresse, $newAdresse);

        

        var_dump($newData);
        //array_push($newData, $modifUser);
        return $newData;
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
