<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\RoleModel;

class DAORole extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($role) {
        
        $sql = "INSERT INTO role (nom) VALUES ('".$role->getNom()."')";

        $this->getPdo()->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM role WHERE id=".$id;
        $this->getPdo()->query($sql);
    }

    //Retourne un tableau de tous les tupples, chaque tupple est sous forme d'objet
    public function getAll() {

        $sql = "SELECT * FROM role";

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
        
        $request = "SELECT * FROM role ";

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

        $sql = "SELECT * FROM role WHERE id=".$id;
        $item = $this->getPdo()->query($sql)->fetch();
        $newObjet = new RoleModel();
        $newObjet->setId($item['id']); 
        $newObjet->setNom($item['nom']);

        return $newObjet;
    }

    //Update d'un utilisateur selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    
    public function updateMe($idObjet,$newValeurs){

        $sql = "UPDATE role SET ";

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


    //Recupere le dernier tupple ajouté

    public function theLastOne() {

        $sql = "SELECT * FROM role ORDER BY id DESC";
        $item = $this->getPdo()->query($sql)->fetch();
        $newObjet = $this->retrieve($item['id']);
        return $newObjet;
    }

}
