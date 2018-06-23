<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\UtilisateurModel;

class DAOUtilisateur extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($user) {
        
        $sql = "INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, date_creation, role_id, adresse_id) VALUES ('"
        .$user->getNom()."','"
        .$user->getPrenom()."','"
        .$user->getEmail()."','"
        .$user->getMotDePasse()."','"
        .$user->getDateCreation()."','"
        .$user->getRoleId()."','"
        .$user->getAdresseId()."')";

        $this->getPdo()->query($sql);
    }

    //PAS TESTEE
    public function delete($id) {
        $sql = "DELETE FROM utilisateur WHERE id=".$id;
        $this->getPdo()->query($sql);
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
        $user = new UtilisateurModel();
        $user->setId($result['id']); 
        $user->setNom($result['nom']);
        $user->setPrenom($result['prenom']);
        $user->setEmail($result['email']);
        $user->setMotDePasse($result['mot_de_passe']);
        $user->setDateCreation($result['date_creation']);
        $user->setRoleId($result['role_id']);
        $user->setAdresseId($result['adresse_id']);

        return $user;
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

        $this->getPdo()->query($sql);

    }

    public function update($newValeurs){

    }



}
