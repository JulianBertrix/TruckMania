<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\AvisModel;

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

        $this->getPdo()->query($sql)->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM utilisateur WHERE id=".$id;
        $this->getPdo()->query($sql)->execute();
    }

    public function getAll() {

        $sql = "SELECT * FROM utilisateur";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeUsers = array();

        foreach ($resultats as $item) {
            
            $newUser = new UtilisateurModel();

            $newUser->setId($item['id']); 
            $newUser->setNom($item['nom']);
            $newUser->setPrenom($item['prenom']);
            $newUser->setEmail($item['email']);
            $newUser->setMotDePasse($item['mot_de_passe']);
            $newUser->setDateCreation($item['date_creation']);
            $newUser->setRoleId($item['role_id']);
            $newUser->setAdresseId($item['adresse_id']);

            array_push($listeUsers,$newUser);
        }

        return $listeUsers;
    }

    //Recup liste selon filtre du type ["attribut" => "valeur"]
    public function getAllBy($filter) {
        
        $request = "SELECT * FROM utilisateur ";

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

        $listeUsers = array();

        foreach ($resultats as $item) {
            
            $newUser = new UtilisateurModel();

            $newUser->setId($item['id']); 
            $newUser->setNom($item['nom']);
            $newUser->setPrenom($item['prenom']);
            $newUser->setEmail($item['email']);
            $newUser->setMotDePasse($item['mot_de_passe']);
            $newUser->setDateCreation($item['date_creation']);
            $newUser->setRoleId($item['role_id']);
            $newUser->setAdresseId($item['adresse_id']);

            array_push($listeUsers,$newUser);
        }

        return $listeUsers;
    }

    public function retrieve($id) {

        $sql = "SELECT * FROM utilisateur WHERE id=".$id;
        $result = $this->getPdo()->query($sql)->fetch(); //PDO::FETCH_ASSOC
        $avis = new UtilisateurModel();
        $avis->setId($result['id']); 
        $avis->setNom($result['nom']);
        $avis->setPrenom($result['prenom']);
        $avis->setEmail($result['email']);
        $avis->setMotDePasse($result['mot_de_passe']);
        $avis->setDateCreation($result['date_creation']);
        $avis->setRoleId($result['role_id']);
        $avis->setAdresseId($result['adresse_id']);

        return $avis;
    }

    //Update d'un utilisateur selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    
    public function updateMe($idUser,$newValeurs){

        $sql = "UPDATE utilisateur SET ";

        $compteur = 0;

        foreach ($newValeurs as $key => $value) {

            if($compteur === (count($newValeurs)-1)){
                $sql .= $key . " = '" . $value . "' ";
            }else{
                $sql .= $key . " = '" . $value . "', ";
            }

            $compteur++;
        }

        $sql .= "WHERE id = " . $idUser;

        var_dump($sql);

        $this->getPdo()->query($sql)->execute();

    }

    public function update($newValeurs){

    }



}
