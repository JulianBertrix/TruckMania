<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\AvisModel;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\models\TrucksModel;
use BWB\Framework\mvc\dao\DAOCommande;
use BWB\Framework\mvc\models\CommandeModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;
use BWB\Framework\mvc\models\UtilisateurModel;

class DAOAvis extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($avis) {

        $dateDuJour = date("Y-m-d H:i:s");
        
        $sql = "INSERT INTO avis (date_ajout, message, note) VALUES ('"
        .$dateDuJour."','"
        .$avis->getMessage()."','"
        .$avis->getNote()."')";
        
        $this->getPdo()->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM avis WHERE id=".$id;
        $this->getPdo()->query($sql);
    }

    //Retourne un tableau de tous les tupples, chaque tupple est sous forme d'objet
    public function getAll() {

        $sql = "SELECT * FROM avis";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeAvis = array();

        foreach ($resultats as $item) {
            $newAvis = $this->retrieve($item['id']);
            array_push($listeAvis,$newAvis);
        }

        return $listeAvis;
    }

    //Recup liste selon filtre du type ["attribut" => "valeur"]
    public function getAllBy($filter) {
        
        $request = "SELECT * FROM avis ";

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

        $listeAvis = array();

        foreach ($resultats as $item) {
            $newAvis = $this->retrieve($item['id']);
            array_push($listeAvis,$newAvis);
        }
        
        return $listeAvis;
    }

    public function retrieve($id) {

//        $sql = "SELECT * FROM avis WHERE id=".$id;
//        $result = $this->getPdo()->query($sql)->fetch();
//        $avis = new AvisModel($result['message'],$result['note']);
//        $avis->setId($result['id']); 
//        $avis->setDateAjout($result['date_ajout']);
//        
//        return $avis;
        $sql = "SELECT * FROM avis WHERE id=".$id;
        $item = $this->getPdo()->query($sql)->fetch();
        $newObjet = new AvisModel();
        $newObjet->setId($item['id']); 
        $newObjet->setDateAjout($item['date_ajout']);
        $newObjet->setMessage($item['message']);
        $newObjet->setNote($item['note']);
   
        //Recup de l'objet foodtruck
        $newItem = (new DAOTrucks())->retrieve($item['foodtruck_id']);
        $newObjet->setFoodtruckId($newItem);
        
        //Recup de l'objet utilisateur
        $newItem = (new DAOUtilisateur())->retrieve($item['utilisateur_id']);
        $newObjet->setUtilisateurId($newItem);
        
        $newItem = (new DAOCommande())->retrieve($item['commande_numero']);
        return $newObjet;
    }

    //Update d'un utilisateur selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    
    public function updateMe($idAvis,$newValeurs){

        $sql = "UPDATE avis SET ";

        $compteur = 0;

        foreach ($newValeurs as $key => $value) {

            if($compteur === (count($newValeurs)-1)){
                $sql .= $key . " = '" . $value . "' ";
            }else{
                $sql .= $key . " = '" . $value . "', ";
            }

            $compteur++;
        }

        $sql .= "WHERE id = " . $idAvis;

        $this->getPdo()->query($sql);

    }

    public function update($newValeurs){

    }


    //Recupere le dernier tupple ajouté

    public function theLastOne() {

        $sql = "SELECT * FROM avis ORDER BY id DESC";
        $result = $this->getPdo()->query($sql)->fetch();
        $avis = $this->retrieve($result['id']);

        return $avis;
    }

}
