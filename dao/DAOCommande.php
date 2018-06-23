<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\CommandeModel;

class DAOCommande extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($commande) {

        $dateDuJour = date("Y-m-d H:i:s");
        
        $sql = "INSERT INTO commande (date_commande, utilisateur_id, foodtruck_id, avis_id, total) VALUES ('"
        .$dateDuJour."','"
        .$commande->getUtilisateurId()."','"
        .$commande->getFoodtruckId()."','"
        .$commande->getAvisId()."','"
        .$commande->getTotal()."')";

        $this->getPdo()->query($sql);
    }

    public function delete($numero) {
        $sql = "DELETE FROM commande WHERE numero=".$numero;
        $this->getPdo()->query($sql);
    }

    public function getAll() {

        $sql = "SELECT * FROM commande";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeToReturn = array();

        foreach ($resultats as $item) {
            
            $newObjet = new CommandeModel();

            $newObjet->setNumero($item['numero']); 
            $newObjet->setDateCommande($item['date_commande']);
            $newObjet->setUtilisateurId($item['utilisateur_id']);
            $newObjet->setFoodtruckId($item['foodtruck_id']);
            $newObjet->setAvisId($item['avis_id']);
            $newObjet->setTotal($item['total']);

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
            
            $newObjet = new CommandeModel();

            $newObjet->setNumero($item['numero']); 
            $newObjet->setDateCommande($item['date_commande']);
            $newObjet->setUtilisateurId($item['utilisateur_id']);
            $newObjet->setFoodtruckId($item['foodtruck_id']);
            $newObjet->setAvisId($item['avis_id']);
            $newObjet->setTotal($item['total']);

            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    public function retrieve($numero) {

        $sql = "SELECT * FROM commande WHERE numero=".$numero;
        $result = $this->getPdo()->query($sql)->fetch(); //PDO::FETCH_ASSOC
        $newObjet = new CommandeModel();
        $newObjet->setNumero($item['numero']); 
        $newObjet->setDateCommande($item['date_commande']);
        $newObjet->setUtilisateurId($item['utilisateur_id']);
        $newObjet->setFoodtruckId($item['foodtruck_id']);
        $newObjet->setAvisId($item['avis_id']);
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
        $item = $this->getPdo()->query($sql)->fetch(); //PDO::FETCH_ASSOC
        $newObjet = new CommandeModel();
        $newObjet->setNumero($item['numero']); 
        $newObjet->setDateCommande($item['date_commande']);
        $newObjet->setUtilisateurId($item['utilisateur_id']);
        $newObjet->setFoodtruckId($item['foodtruck_id']);
        $newObjet->setAvisId($item['avis_id']);
        $newObjet->setTotal($item['total']);

        return $newObjet;
    }

}
