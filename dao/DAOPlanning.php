<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\PlanningModel;

class DAOPlanning extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($planning) {

        $sql = "INSERT INTO planning (date_debut,date_fin) VALUES ('"
        .$planning->getDateDebut()."','"
        .$planning->getDateFin()."')";
        $this->getPdo()->query($sql);
    }

    //Liste des planning pour un FT
    public function planningForTruck($idTruck) {

        $sql = "SELECT * FROM planning WHERE foodtruck_id = ".$idTruck;

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $ListeRetour = array();

        foreach($resultats as $item){
            $newObjet = (new DAOEvenement())->retrieve($item['evenement_id']);
            array_push($ListeRetour,$newObjet);
        }

        return $ListeRetour;
    }

    public function delete($id) {
        $sql = "DELETE FROM planning WHERE id=".$id;
        $this->getPdo()->query($sql);
    }

    //Retourne un tableau de tous les tupples, chaque tupple est sous forme d'objet
    public function getAll() {

        $sql = "SELECT * FROM planning";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeToReturn = array();

        foreach ($resultats as $item) {
            $newObjet = $this->retrieve($item['id']);
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
            $newObjet = $this->retrieve($item['id']);
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    public function retrieve($id) {

        $sql = "SELECT * FROM planning WHERE id=".$id;
        $item = $this->getPdo()->query($sql)->fetch();
        $newObjet = new PlanningModel();
        $newObjet->setId($item['id']); 
        $newObjet->setDateDebut($item['date_debut']);
        $newObjet->setDateFin($item['date_fin']);

        return $newObjet;
    }

    //Update d'un utilisateur selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    
    public function updateMe($idObjet,$newValeurs){

        $sql = "UPDATE planning SET ";

        $compteur = 0;

        foreach ($newValeurs as $key => $value) {

            if($compteur === (count($newValeurs)-1)){
                $sql .= $key . " = '" . $value . "' ";
            }else{
                $sql .= $key . " = '" . $value . "', ";
            }

            $compteur++;
        }

        $sql .= "WHERE id = " . $idObjet;

        $this->getPdo()->query($sql);

    }

    public function update($newValeurs){

    }

    //Recup liste des planning englobant une date
    public function getAllByDate($dateP) {
        
        $request = "SELECT * FROM planning WHERE date_debut <= '".$dateP."' AND date_fin >= '".$dateP."'";

        $resultats = $this->getPdo()->query($request)->fetchAll();

        $listeToReturn = array();

        foreach ($resultats as $item) {          
            $newObjet = $this->retrieve($item['id']);
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }
    //Recupere le dernier tupple ajouté

    public function theLastOne() {

        $sql = "SELECT * FROM planning ORDER BY id DESC";
        $item = $this->getPdo()->query($sql)->fetch();
        $newObjet = $this->retrieve($item['id']);
        return $newObjet;
    }

}
