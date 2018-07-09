<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOCommande;

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

    public function create($newCommande){
        return $this->commande->create($newCommande);
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

}
