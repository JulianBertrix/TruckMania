<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOCommande;
use BWB\Framework\mvc\dao\DAOPanier;
use BWB\Framework\mvc\models\PanierModel;
use BWB\Framework\mvc\models\CommandeModel;
use BWB\Framework\mvc\dao\DAOPlat;

class CommandeController extends Controller {

    private $numero;
    private $dateCommande;
    private $utilisateurId;
    private $foodtruckId;
    private $avisId;
    private $total;
    private $commande;

    public function __construct(){
        parent::__construct();
        $this->commande = new DAOCommande();
    }

    public function getAllJSON(){
        header("Content-Type: application/json");
        echo json_encode($this->commande->getAll());
    }

    public function getAll(){
        return $this->commande->getAll();
    }

    public function getAllBy($filter){
        return $this->commande->getAllBy($filter);
    }
    public function retrieve($id){
        return $this->commande->retrieve($id);
    }

    public function create(){
        header("Content-Type: text/plain");
        
        $dataPost = $this->inputPost();
        $newDate = null;
        
        //recuperation de la date
        if(isset($dataPost['dateRequest']) && isset($dataPost['heureRequest'])){
            $dateCommande = $dataPost['dateRequest']." ".$dataPost['heureRequest'];
            $newDate = date_format(date_create_from_format('d/m/Y H:i', $dateCommande), 'Y-m-d H:i');
        }
        
        //creation de la commande
        $newCommande = new CommandeModel();
        $newCommande->setDateCommande($newDate);
        $newCommande->setUtilisateurId($dataPost['utilisateur_id']);
        $newCommande->setFoodtruckId($dataPost['foodtruck_id']);
        $newCommande->setTotal($dataPost['total']);
        $newCommandeId = $this->commande->create($newCommande);
        
        //creation du panier
        for($i = 0; $i < count($dataPost['plat']); $i++){
            if($dataPost['quantite'][$i] != 0){
                //recuperation id du plat
                $filter = ['nom' => $dataPost['plat'][$i],
                        'foodtruck_id' => $dataPost['foodtruck_id']];
                $platId = (new DAOPlat)->getAllBy($filter)[0]->getId();
                $panier = new PanierModel((new DAOCommande())->retrieve($newCommandeId), 
                        (new DAOPlat())->retrieve($platId), $dataPost['quantite'][$i]);
                (new DAOPanier)->create($panier);
            }
        }
        echo $dataPost['plat'][0];
    }

    public function delete($id){
        return $this->commande->delete($id);
    }

    public function updateMe($idCommande,$newValeurs) {
        return $this->commande->updateMe($idCommande,$newValeurs);
    }

    public function update($newValeurs) {
        return $this->commande->update($newValeurs);
    }

    public function theLastOne() {
        return $this->commande->theLastOne();
    }
    
    public function getFullCommande($numero){
        return $this->commande->theFullCommande($numero);
    }

}
