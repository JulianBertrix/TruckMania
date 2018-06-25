<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\PanierModel;
use BWB\Framework\mvc\dao\DAOCommande;
use BWB\Framework\mvc\dao\DAOPlat;
/**
 * Description of DAOPanier
 *
 * @author julianbertrix
 */
class DAOPanier extends DAO{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function create($array) {
        $sql = "INSERT INTO panier (commande_numero, plat_id, quantite)"
                . " VALUES ('".$array->getNumeroCommande()."','".$array->getPlatId()."','".$array->getQuantite()."')";
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function delete($objet) {
        $sql = "DELETE FROM panier WHERE commande_numero=".$objet->getNumeroCommande()." AND plat_id=".$objet->getPlatId();
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }

    public function getAll() {
        $sql = "SELECT * FROM panier";

        $resultats = $this->getPdo()->query($sql)->fetchAll();

        $liste = array();

        foreach ($resultats as $item) {
            $newPanier = $this->retrieve(new PanierModel($item['commande_numero'], $item['plat_id']), $item['quantite']);
            array_push($liste,$newPanier);
        }

        return $liste;
    }

    public function getAllBy($filter) {
        $request = "SELECT * FROM panier ";

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
        var_dump($resultats);
        $listeToReturn = array();

        foreach ($resultats as $item) {          
            $newObjet = $this->retrieve($item['id']);
            array_push($listeToReturn,$newObjet);
        }

        return $listeToReturn;
    }

    public function retrieve($objet) {
        //Recup de l'objet commande
       $newCommande = (new DAOCommande())->retrieve($objet->getNumeroCommande());
       
       //Recup de l'objet plat
       $newPlat = (new DAOPlat())->retrieve($objet->getPlatId());
       
       //Creation du nouvel objet d'objets
       $newObjet = new PanierModel($newCommande,$newPlat);
       
       return $newObjet;
    }

    public function update($array) {
        $sql = "UPDATE panier SET plat_id='".$array->getPlatId()."', quantite='".$array->getQuantite()."' "
                . "WHERE commande_numero=".$array->getNumeroCommande();
        echo $sql;
        return $this->getPdo()->query($sql)->fetch();
    }

}
