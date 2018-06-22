<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\UtilisateurModel;

class DAOUtilisateur extends DAO{

    public function __construct(){
        parent::__construct();
    }

    //SELECT * FROM `utilisateur` ORDER BY id DESC

    public function create($user) {
        
        $sql = "INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, date_creation, role_id, adresse_id) VALUES ('"
        .$user->getNom()."','"
        .$user->getPrenom()."','"
        .$user->getEmail()."','"
        .$user->getMotDePasse()."','"
        .$user->getDateCreation()."','"
        .$user->getRoleId()."','"
        .$user->getAdresseId()."')";

        $this->getPdo()->query($sql)->execute();
    }

    public function delete($id) {
        
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

    public function getAllBy($filter) {
        
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

    public function update($array) {
        
    }


}
