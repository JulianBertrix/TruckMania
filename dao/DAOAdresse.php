<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\AdresseModel;

class DAOAdresse extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($adresse) {
        
        $sql = "INSERT INTO adresse (adresse, latitude, longitude) VALUES ('"
        .$adresse->getAdresse()."','"
        .$adresse->getLatitude()."','"
        .$adresse->getLongitude()."')";

        $this->getPdo()->query($sql);

        return $this->getPdo()->lastInsertId();
    }

    public function delete($id) {
        $sql = "DELETE FROM adresse WHERE id=".$id;
        $this->getPdo()->query($sql);
    }

    //Retourne un tableau de tous les tupples, chaque tupple est sous forme d'objet
    public function getAll() {

        $sql = "SELECT * FROM adresse";

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
        
        $request = "SELECT * FROM adresse ";

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

        $sql = "SELECT * FROM adresse WHERE id=".$id;
        $item = $this->getPdo()->query($sql)->fetch();
        $newObjet = new AdresseModel();
        $newObjet->setId($item['id']); 
        $newObjet->setAdresse($item['adresse']);
        $newObjet->setLatitude($item['latitude']);
        $newObjet->setLongitude($item['longitude']);

        return $newObjet;
    }

    //Update d'un utilisateur selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    
    public function updateMe($idObjet,$newValeurs){

        $sql = "UPDATE adresse SET ";

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

}
