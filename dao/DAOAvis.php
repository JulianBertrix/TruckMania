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

        $this->getPdo()->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM avis WHERE id=".$id;
        $this->getPdo()->query($sql);
    }

    public function getAll() {

        $sql = "SELECT * FROM avis";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $listeAvis = array();

        foreach ($resultats as $item) {
            
            $newAvis = new AvisModel($item['message'],$item['note']);

            $newAvis->setId($item['id']); 
            $newAvis->setDateAjout($item['date_ajout']);

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
            
            $newAvis = new AvisModel();

            $newAvis->setId($item['id']); 
            $newAvis->setDateAjout($item['date_ajout']);
            $newAvis->setMessage($item['message']);
            $newAvis->setNote($item['note']);

            array_push($listeAvis,$newAvis);
        }

        return $listeAvis;
    }

    public function retrieve($id) {

        $sql = "SELECT * FROM avis WHERE id=".$id;
        $result = $this->getPdo()->query($sql)->fetch(); //PDO::FETCH_ASSOC
        $avis = new AvisModel($result['message'],$result['note']);
        $avis->setId($result['id']); 
        $avis->setDateAjout($result['date_ajout']);

        return $avis;
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
        $result = $this->getPdo()->query($sql)->fetch(); //PDO::FETCH_ASSOC
        $avis = new AvisModel(null,null);
        $avis->setId($result['id']); 
        $avis->setDateAjout($result['date_ajout']);
        $avis->setMessage($result['message']);
        $avis->setNote($result['note']);

        return $avis;
    }

}
