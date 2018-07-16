<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\FavorisModel;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\dao\DAOUtilisateur;

class DAOFavoris extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($favoris) {

        $sql = "INSERT INTO favoris (utilisateur_id,foodtruck_id) VALUES ("
        .$favoris->getUtilisateurId().","
        .$favoris->getFoodtruckId().")";
        $this->getPdo()->query($sql);

        return $this->getPdo()->lastInsertId();
    }

    public function delete($objet) {
        $sql = "DELETE FROM favoris WHERE 
        utilisateur_id=".$objet->getUtilisateurId()
        ." AND foodtruck_id=".$objet->getFoodtruckId();
        $this->getPdo()->query($sql);
        return $sql;
    }

    //Retourne un tableau de tous les tupples, chaque tupple est sous forme d'objet
    public function getAll() {

        $sql = "SELECT * FROM favoris";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeToReturn = array();

        foreach ($resultats as $item) {
            $newObjet = $this->retrieve(new FavorisModel($item['utilisateur_id'],$item['foodtruck_id']));
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    //Recup liste selon filtre du type ["attribut" => "valeur"]
    public function getAllBy($filter) {
        
        $request = "SELECT * FROM favoris ";

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
            $newObjet = $this->retrieve(new FavorisModel($item['utilisateur_id'],$item['foodtruck_id']));
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    public function retrieve($objet) {

        //Recup de l'objet utilisateur
        $newUser= (new DAOUtilisateur())->retrieve($objet->getUtilisateurId());

        //Recup de l'objet foodtruck
        $newTruck = (new DAOTrucks())->retrieve($objet->getFoodtruckId());

        //Creation du nouvel objet d'objets
        $newObjet = new FavorisModel($newUser,$newTruck);

        return $newObjet;
    }

    //Update d'un utilisateur selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    
    public function updateMe($objet,$newValeurs){

        $sql = "UPDATE favoris SET ";

        $compteur = 0;

        foreach ($newValeurs as $key => $value) {

            if($compteur === (count($newValeurs)-1)){
                $sql .= $key . " = " . $value . " ";
            }else{
                $sql .= $key . " = " . $value . ", ";
            }

            $compteur++;
        }

        $sql .= "WHERE utilisateur_id=".$objet->getUtilisateurId()
        ." AND foodtruck_id=".$objet->getFoodtruckId();

        $this->getPdo()->query($sql);

    }

    public function update($newValeurs){

    }

}
