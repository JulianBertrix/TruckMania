<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\models\RoleModel;
use BWB\Framework\mvc\models\AdresseModel;
use BWB\Framework\mvc\dao\DAORole;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\dao\DAOTrucks;

class DAOUtilisateur extends DAO{

    public function __construct(){
        parent::__construct();
    }

    public function create($user) {
        
        $sql = "INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, date_creation, role_id, adresse_id, foodtruck_id) VALUES ('"
        .$user->getNom()."','"
        .$user->getPrenom()."','"
        .$user->getEmail()."','"
        .$user->getMotDePasse()."','"
        .$user->getDateCreation()."','"
        .$user->getRoleId()->getId()."','"
        .$user->getAdresseId()->getId()."','"
        .$user->getFoodTruckId()->getId()."')";
    
        $this->getPdo()->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM utilisateur WHERE id=".$id;
        $this->getPdo()->query($sql);
    }

    //Retourne un tableau de tous les tupples, chaque tupple est sous forme d'objet
    public function getAll() {

        $sql = "SELECT * FROM utilisateur";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeUsers = array();

        foreach ($resultats as $item) {
            $newUser = $this->retrieve($item['id']);
            array_push($listeUsers,$newUser);
        }

        return $listeUsers;
    }

    //Recup de l'objet utilisateur à partir du 

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
            $newUser = $this->retrieve($item['id']);
            array_push($listeUsers,$newUser);
        }

        return $listeUsers;
    }

    public function retrieve($id) {

        $sql = "SELECT * FROM utilisateur WHERE id=".$id;
        $result = $this->getPdo()->query($sql)->fetch();
        $user = new UtilisateurModel();
        $user->setId($result['id']); 
        $user->setNom($result['nom']);
        $user->setPrenom($result['prenom']);
        $user->setEmail($result['email']);
        $user->setMotDePasse($result['mot_de_passe']);
        $user->setDateCreation($result['date_creation']);

        //Recup de l'objet role
        $newItem = (new DAORole())->retrieve($result['role_id']);
        $user->setRoleId($newItem);

        //Recup de l'objet adresse
        $newItem = (new DAOAdresse())->retrieve($result['adresse_id']);
        $user->setAdresseId($newItem);

        //Recup de l'objet foodtruck SI EXISTE (!= 0)
       if($result['foodtruck_id'] != 0){
           $newItem = (new DAOTrucks())->retrieve($result['foodtruck_id']);
           $user->setFoodTruckId($newItem);
       }else{
           $user->setFoodTruckId(0);
       }
       
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
        return $sql;

    }

    public function update($objet){
        
        $sql = "UPDATE utilisateur SET 
        nom= '".$objet->getNom()
        ."', prenom='".$objet->getPrenom()
        ."', email='".$objet->getEmail()
        ."', mot_de_passe='".$objet->getMotDePasse()
        ."' WHERE id=".$objet->getId();

        $this->getPdo()->query($sql);
    }

    //Recupere le dernier tupple ajouté

    public function checkCredits($email,$password) {

        $hashPwd = hash("sha1",$password);

        $sql = "SELECT * FROM utilisateur WHERE email = '".$email."' && mot_de_passe = '".$hashPwd."';";
        
        $item = $this->getPdo()->query($sql)->fetch();

        if($item !== false){
            return $this->retrieve($item['id']);
        }else{
            return false;
        }
    }

}
