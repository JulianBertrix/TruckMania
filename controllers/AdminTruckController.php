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
use BWB\Framework\mvc\dao\DAOCommandes;
use BWB\Framework\mvc\dao\DAOPlats;

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
                "siret" => $truck->getSiret(),
                "nom" => $truck->getNom(),
                "logo" => $truck->getLogo(),
                "moyenne" => $truck->getLogo(),
                "catId" => $truck->getCategorieId()->getId(),
                "catIntitule" => $truck->getCategorieId()->getIntitule()
            ];

            //Liste des commandes completes avec methode theFullCommande($numero)
            $listeObjetsCommandes = (new DAOCommandes())->getAllBy(["foodtruck_id" => $truck->getId()]);
            $listeCommandes = [];
            foreach($listeObjetsCommandes as $item){
                array_push($listeCommandes,(new DAOCommandes())->theFullCommande($item->getNumero()));
            }

            //Nombre de favoris tableau de stats
            $nbFavoris = sizeof((new DAOFavoris())->getAllBy(["foodtruck_id" => $truck->getId()]));

            //Liste de ses adresses
            $listeAdresseObj = getAdressesForTruck($truck->getId());
            $listeAdresses = [];
            foreach($listeAdresseObj as $item){
                array_push($listeAdresses,$item->jsonSerialize());
            }

            //Creation de datas
            $datas = array(
                'infosTruck' => $infos,
                'listeAdresse' => $listeAdresses,
                'listeCommandes' => $listeCommandes,
                'nbFavoris' => $nbFavoris
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
