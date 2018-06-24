<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\PresenceModel;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\dao\DAOPlanning;
use BWB\Framework\mvc\dao\DAOAdresse;

class DAOPresence extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($presence) {

        $sql = "INSERT INTO presence (planning_id,foodtruck_id,adresse_id) VALUES ("
        .$presence->getPlanningId().","
        .$presence->getFoodtruckId().","
        .$presence->getAdresseId().")";
        echo $sql;
        $this->getPdo()->query($sql);
    }

    public function delete($objet) {
        $sql = "DELETE FROM presence WHERE 
        planning_id=".$objet->getPlanningId()
        ." AND foodtruck_id=".$objet->getFoodtruckId()
        ." AND adresse_id=".$objet->getAdresseId();
        $this->getPdo()->query($sql);
    }

    //Retourne un tableau de tous les tupples, chaque tupple est sous forme d'objet
    public function getAll() {

        $sql = "SELECT * FROM presence";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeToReturn = array();

        foreach ($resultats as $item) {
            $newObjet = $this->retrieve(new PresenceModel($item['planning_id'],$item['foodtruck_id'],$item['adresse_id']));
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    //Recup liste selon filtre du type ["attribut" => "valeur"]
    public function getAllBy($filter) {
        
        $request = "SELECT * FROM presence ";

        $i = 0;

        foreach ($filter as $key => $value) {
            if($i===0){
                $request .= "WHERE ";
                $i++;
            }else{
                $request .= "AND ";
            }
            $request .= $key."='".$value."' ";
        }

        $resultats = $this->getPdo()->query($request)->fetchAll();

        $listeToReturn = array();

        foreach ($resultats as $item) {          
            $newObjet = $this->retrieve(new PresenceModel($item['planning_id'],$item['foodtruck_id'],$item['adresse_id']));
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    public function retrieve($objet) {

        //Recup de l'objet planning
        $newPlanning = (new DAOPlanning())->retrieve($objet->getPlanningId());

        //Recup de l'objet foodtruck
        $newTruck = (new DAOTrucks())->retrieve($objet->getFoodtruckId());

        //Recup de l'objet adresse
        $newAdresse = (new DAOAdresse())->retrieve($objet->getAdresseId());

        $newObjet = new PresenceModel($newPlanning,$newTruck,$newAdresse);

        return $newObjet;
    }

    //Update d'un utilisateur selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    
    public function updateMe($objet,$newValeurs){

        $sql = "UPDATE presence SET ";

        $compteur = 0;

        foreach ($newValeurs as $key => $value) {

            if($compteur === (count($newValeurs)-1)){
                $sql .= $key . " = '" . $value . "' ";
            }else{
                $sql .= $key . " = '" . $value . "', ";
            }

            $compteur++;
        }

        $sql .= "WHERE planning_id=".$objet->getPlanningId()
        ." AND foodtruck_id=".$objet->getFoodtruckId()
        ." AND adresse_id=".$objet->getAdresseId();;

        $this->getPdo()->query($sql);

    }

    public function update($newValeurs){

    }

}
