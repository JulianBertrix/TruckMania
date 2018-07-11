<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\dao\DAOFavoris;
use BWB\Framework\mvc\dao\DAOCommande;
use BWB\Framework\mvc\dao\DAOPlat;
use BWB\Framework\mvc\dao\DAOPlanning;

require 'CheckURI.php';

class AdminTruckController extends Controller{
    
    function __construct() {
        parent::__construct();
        $this->securityLoader();
    }

    public function adminTruck($idUser,$idTruck) {

        //CHECH SECURITY

        if(checkMe($this->security->acceptConnexion(),$_SERVER['REQUEST_URI'])){

            //Recup de l'objet truck en cours
            $truck = (new DAOTrucks())->retrieve($idTruck);

            //Infos du truck + categorie
            $infos = [
                "id" => $truck->getId(),
                "siret" => $truck->getSiret(),
                "nom" => $truck->getNom(),
                "logo" => $truck->getLogo(),
                "logoChemin" => "http://".$_SERVER['SERVER_NAME'] . "/assets/img/trucks/".$truck->getLogo(),
                "moyenne" => $truck->getMoyenne(),
                "catId" => $truck->getCategorieId()->getId(),
                "catIntitule" => $truck->getCategorieId()->getIntitule()
            ];

            //Liste des commandes completes avec methode theFullCommande($numero)
            $listeObjetsCommandes = (new DAOCommande())->getAllBy(["foodtruck_id" => $truck->getId()]);
            $listeCommandes = [];
            foreach($listeObjetsCommandes as $item){
                array_push($listeCommandes,(new DAOCommande())->theFullCommande($item->getNumero()));
            }

            //Nombre de favoris tableau de stats
            $nbFavoris = count((new DAOFavoris())->getAllBy(["foodtruck_id" => $truck->getId()]));

            //Liste de ses adresses
            $listeAdresseObj = (new DAOPlanning())->getAdressesForTruck($truck->getId());
            $listeAdresses = [];
            foreach($listeAdresseObj as $item){
                array_push($listeAdresses,$item->jsonSerialize());
            }

            //Liste de tous ses plats pour gestion carte
            $listePlatsObj = (new DAOPlat())->getAllBy(['foodtruck_id' => $truck->getId()]);
            $listePlats = [];
            foreach($listePlatsObj as $item){
                array_push($listePlats,$item->jsonSerialize());
            }

            //Creation de datas
            $datas = array(
                'infosTruck' => $infos,
                'listeAdresse' => $listeAdresses,
                'listeCommandes' => $listeCommandes,
                'nbFavoris' => $nbFavoris,
                'listePlats' => $listePlats
            );         
         
            //Creation de la vue
            $this->render("profileTruck", $datas);

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
