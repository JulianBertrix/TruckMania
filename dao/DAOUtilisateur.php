<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\UtilisateurModel;

class DAOUtilisateur extends DAO{

    public function __construct(){
        parent::__construct();
    }

    //put your code here
    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {

        $sql = "SELECT * FROM utilisateur";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeUsers = array();

        foreach ($resultats as $item) {
            
            
        }
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        
    }

    public function update($array) {
        
    }


}
