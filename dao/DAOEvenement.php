<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\EvenementModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;
use BWB\Framework\mvc\dao\DAOAdresse;

class DAOEvenement extends DAO{

    public function __construct(){
        parent::__construct();
    }(){
    
    public function create($evenement) {
        $userId = $evenement->getUtilisateur_id()->getId();
        $adresseId = $evenement->getAdresse_id()->getId();
        $sql = "INSERT INTO evenement (date_creation, intitule, date_debut, date_fin, description, image, nombre_de_participant, utilisateur_id, adresse_id) VALUES ('"
        .$evenement->getDate_creation()."','"
        .$evenement->getIntitule()."','"
        .$evenement->getDate_debut()."','"
        .$evenement->getDate_fin()."','"
        .$evenement->getDescription()."','"
        .$evenement->getImage()."','"
        .$evenement->getNombreDeParticipant()."','"
        .$userId."','"
        .$adresseId."')";

        $this->getPdo()->query($sql);
        echo $sql;
    }

    public function delete($id) {
        $sql = "DELETE FROM evenement WHERE id=".$id;
        $this->getPdo()->query($sql);
    }

    public function getAll() {
        $sql = "SELECT * FROM evenement";

        $events = $this->getPdo()->query($sql)->fetchAll();
        //var_dump($events);
        $listeEvenements = array();

        foreach($events as $item){
            $newEvenement = $this->retrieve($item['id']);
            array_push($listeEvenements,$newEvenement);
        }
        return $listeEvenements;
    }

    public function getAllBy($filter) {
        $request = "SELECT * FROM evenement ";
        $i = 0;

        foreach($filter as $key => $value){
            if($i === 0){
                $request .= "WHERE ";
                $i++;
            }else{
                $request .= "AND ";
            }
            $request .= $key."='".$value."' ";
        }   echo $request;
            $resultats = $this->getPdo()->query($request)->fetchAll();
            
            $listeEvenements = array();
            
            foreach($resultats as $item){
                $newEvenement = $this->retrieve($item['id']);
                array_push($listeEvenements,$newEvenement);            
            }
            return $listeEvenements;
        }

    public function retrieve($id) {
        $sql = "SELECT * FROM evenement WHERE id=".$id;
        $result = $this->getPdo()->query($sql)->fetch();
        $evenement = new EvenementModel();
        $evenement->setId($result['id']);
        $evenement->setDate_creation($result['date_creation']);
        $evenement->setIntitule($result['intitule']);
        $evenement->setDate_debut($result['date_debut']);
        $evenement->setDate_fin($result['date_fin']);
        $evenement->setDescription($result['description']);
        $evenement->setImage($result['image']);
        $evenement->setNombreDeParticipant($result['nombre_de_participant']);

        $newItem = (new DAOUtilisateur())->retrieve($result['utilisateur_id']);
        $evenement->setUtilisateur_Id($newItem);

        $newItem = (new DAOAdresse())->retrieve($result['adresse_id']);

        $evenement->setAdresse_id($newItem);
        return $evenement;
        
    }

    public function update($array) {
        
    }

    public function updateMe($idEvenement,$newValeurs){

        $sql = "UPDATE evenement SET ";

        $compteur = 0;

        foreach($newValeurs as $key => $value){
            if($compteur === (count($newValeurs)-1)){
                $sql .= $key . " = '" . $value . "' ";
            }else{
                $sql .= $key . " = '" . $value . "', ";
            }
            $compteur++;
        }

        $sql .= "WHERE id = " . $idEvenement;
        echo $sql;
        $this->getPdo()->query($sql);
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