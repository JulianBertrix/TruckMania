<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\EvenementModel;

class DAOEvenement extends DAO{

    public function __construct(){
        parent::__construct();
    }
    
    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        
    }

    public function update($array) {
        
    }

    public function getEvenementFive(){

        $sql = "SELECT * FROM evenement ORDER BY date_creation DESC LIMIT 5";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $evenements = array();

        foreach($resultats as $result){
            $evenement = new EvenementModel();
            $evenement->setId($result['id']);
            $evenement->setDate_Creation($result['date_creation']);
            $evenement->setIntitule($result['intitule']);
            $evenement->setDate_Debut($result['date_debut']);
            $evenement->setDate_Fin($result['date_fin']);
            $evenement->setDescription($result['description']);
            $evenement->setImage($result['image']);
            $evenement->setUtilisateur_Id($result['utilisateur_id']);
            $evenement->setAdresse_Id($result['adresse_id']);

            array_push($evenements,$evenement);
        }

            return $evenements;
    }
}