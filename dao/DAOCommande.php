<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\CommandeModel;
use BWB\Framework\mvc\dao\DAOUtilisateur;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\dao\DAOAvis;
use BWB\Framework\mvc\models\AvisModel;

class DAOCommande extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($commande) {

        $dateDuJour = date("Y-m-d H:i:s");
        
        //creation d'un nouvel avis
        $avis = new AvisModel();
        $avis->setMessage("");
        $avis->setNote(0);
        (new DAOAvis())->create($avis);
        $idAvis = $this->getPdo()->lastInsertId();
        
        $sql = "INSERT INTO commande (date_commande, utilisateur_id, foodtruck_id, avis_id, total) VALUES ('"
        .$dateDuJour."','"
        .$commande->getUtilisateurId()."','"
        .$commande->getFoodtruckId()."','"
        .$idAvis."','"
        .$commande->getTotal()."')";
        echo $sql;
        $this->getPdo()->query($sql);
    }

    public function delete($numero) {
        $sql = "DELETE FROM commande WHERE numero=".$numero;
        $this->getPdo()->query($sql);
    }

    //Retourne un tableau de tous les tupples, chaque tupple est sous forme d'objet
    public function getAll() {

        $sql = "SELECT * FROM commande";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeToReturn = array();

        foreach ($resultats as $item) {
            $newObjet = $this->retrieve($item['numero']);
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    //Recup liste selon filtre du type ["attribut" => "valeur"]
    public function getAllBy($filter) {
        
        $request = "SELECT * FROM commande ";

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
            $newObjet = $this->retrieve($item['numero']);
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    public function retrieve($numero) {

        $sql = "SELECT * FROM commande WHERE numero=".$numero;
        $item = $this->getPdo()->query($sql)->fetch();
        $newObjet = new CommandeModel();
        $newObjet->setNumero($item['numero']); 
        $newObjet->setDateCommande($item['date_commande']);

        //Recup de l'objet utilisateur
        $newItem = (new DAOUtilisateur())->retrieve($item['utilisateur_id']);
        $newObjet->setUtilisateurId($newItem);

        //Recup de l'objet foodtruck
        $newItem = (new DAOTrucks())->retrieve($item['foodtruck_id']);
        $newObjet->setFoodtruckId($newItem);

        $newObjet->setTotal($item['total']);

        return $newObjet;
    }

    //Update d'un utilisateur selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    
    public function updateMe($idObjet,$newValeurs){

        $sql = "UPDATE commande SET ";

        $compteur = 0;

        foreach ($newValeurs as $key => $value) {

            if($compteur === (count($newValeurs)-1)){
                $sql .= $key . " = '" . $value . "' ";
            }else{
                $sql .= $key . " = '" . $value . "', ";
            }

            $compteur++;
        }

        $sql .= "WHERE numero = " . $idObjet;

        $this->getPdo()->query($sql);

    }

    public function update($newValeurs){

    }


    //Recupere le dernier tupple ajouté

    public function theLastOne() {

        $sql = "SELECT * FROM commande ORDER BY numero DESC";
        $item = $this->getPdo()->query($sql)->fetch();
        $newObjet = $this->retrieve($item['numero']);
        return $newObjet;
    }

}
