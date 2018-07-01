<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\PlanningModel;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\dao\DAOAdresse;

class DAOPlanning extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($planning) {

        $sql = "INSERT INTO planning (foodtruck_id, adresse_id,date_debut,date_fin, intitule) VALUES ('"
        .$planning->getFoodtruckId()."','"
        .$planning->getAdresseId()."','"
        .$planning->getDateDebut()."','"
        .$planning->getDateFin()."','"
        .$planning->getIntitule()."')";
        $this->getPdo()->query($sql);
    }

    public function delete($listeIds) {
        $sql = "DELETE FROM planning WHERE
         foodtruck_id=".$listeIds['foodtruck_id']
        ." AND date_debut= '".$listeIds['date_debut']
        ."' AND date_fin= '".$listeIds['date_fin']."'";

        $this->getPdo()->query($sql);
    }

    //Retourne un tableau de tous les tupples, chaque tupple est sous forme d'objet
    public function getAll() {

        $sql = "SELECT * FROM planning";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeToReturn = array();

        foreach ($resultats as $item) {
            $liste = ['foodtruck_id'=>$item['foodtruck_id'],'date_debut'=>$item['date_debut'],'date_fin'=>$item['date_fin']];         
            $newObjet = $this->retrieve($liste);
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    //Recup liste selon filtre du type ["attribut" => "valeur"]
    public function getAllBy($filter) {
        
        $request = "SELECT * FROM planning ";

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
            $liste = ['foodtruck_id'=>$item['foodtruck_id'],'date_debut'=>$item['date_debut'],'date_fin'=>$item['date_fin']];         
            $newObjet = $this->retrieve($liste);
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    public function retrieve($listeIds) {

        $sql = "SELECT * FROM planning 
        WHERE foodtruck_id=".$listeIds['foodtruck_id']
        ." AND date_debut= '".$listeIds['date_debut']
        ."' AND date_fin= '".$listeIds['date_fin']."'";
        
        $item = $this->getPdo()->query($sql)->fetch();
        $newObjet = new PlanningModel();

        //Recup objet FoodTruck
        $newObjet->setFoodtruckId((new DAOTrucks())->retrieve($item['foodtruck_id'])); 

        //Recup objet Adresse
        $newObjet->setAdresseId((new DAOAdresse())->retrieve($item['adresse_id']));

        $newObjet->setDateDebut($item['date_debut']);
        $newObjet->setDateFin($item['date_fin']);
        $newObjet->setIntitule($item['intitule']);

        return $newObjet;
    }

    public function update($newValeurs){

    }

    //Recup liste des planning englobant une date
    public function getAllByDate($dateP) {
        
        $request = "SELECT * FROM planning WHERE date_debut <= '".$dateP."' AND date_fin >= '".$dateP."'";

        $resultats = $this->getPdo()->query($request)->fetchAll();

        $listeToReturn = array();

        foreach ($resultats as $item) {
            $liste = ['foodtruck_id'=>$item['foodtruck_id'],'date_debut'=>$item['date_debut'],'date_fin'=>$item['date_fin']];          
            $newObjet = $this->retrieve($liste);
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

}
