<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUtilisateur;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\models\AdresseModel;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\dao\DAORole;
use BWB\Framework\mvc\models\RoleModel;
use BWB\Framework\mvc\dao\DAOCategorie;
use BWB\Framework\mvc\controllers\CategorieController;

class InscriptionTrucksController extends Controller{

    private $newUser;
    
    public function __construct(){
        parent::__construct();
        $this->securityLoader();
        $this->newUser = new DAOUtilisateur(); 
        //$this->newTrucks = new DAOTrucks();   
    }

    public function control(){
         
         //Requp des infos du formulaire
         $dataPost = $this->inputPost();
         

         if(isset($dataPost['nom'])){
            
            $dataPost = new trucksModel();
            $dataPost->setSiret($dataTrucks['siret']);
            $dataPost->setNom($dataTrucks['nom']);
            $dataPost->setDateCreation(date('Y-m-d H:i:s'));
            //$newTrucks->setLogo($dataTrucks['logo']);
            $dataPost->setCategorieId((new DAOCategorie())->retrieve());
            $dataPost->setMoyenne($dataTrucks['moyenne']);
             
            $longitude = '5';
            $latitude = '3';
            $adresse = '6';
            
            //Creation d'un objet Adresse
            $newAdresse = new AdresseModel();
            $newAdresse->setAdresse($adresse);
            $newAdresse->setLatitude($latitude);
            $newAdresse->setLongitude($longitude);

            //REC adresse et Recupération de l'id de l'adresse crée
            $newIdAdresse = (new DAOAdresse())->create($newAdresse);
            
            //Creation d'un objet Utilisateur
            $user = new UtilisateurModel();
            $user->setNom($dataPost['nom']);
            $user->setPrenom($dataPost['prenom']);
            $user->setEmail($dataPost['email']);
            $user->setMotDePasse($dataPost['mot_de_passe']);
            $user->setDateCreation(date('Y-m-d H:i:s'));
            $user->setRoleId((new DAORole())->retrieve(3));
            $user->setAdresseId((new DAOAdresse())->retrieve($newIdAdresse));

            //REC BDD
            $this->newUser->create($user);

            //Redirection Home
            header('Location: http://'.$_SERVER['SERVER_NAME'] .'/');
         
        }else{
            $datas = ['listeCat' => (new CategorieController())->getAllCategorie()];
            
            $this->render('formulaire_trucks',$datas);
         }

    }

    public function inscriptionTruck(){
        $dataTrucks = $this->inputPost();

        if(isset($dataTrucks['nom'])){
            
            

            $this->newTruck->create($newTrucks);

            header('Location: http://'.$_SERVER['SERVER_NAME'] .'/');
        }else{
            $this->render('formulaire_trucks');
        }
    }

     public function create(){
         $dataPost = $this->inputPost();
        
     }

    public function getDefault() {
        $this->render("home");
    }
    
    public function getProfil(){
        $this->render("profileClient");
    }
    
    public function login() {
        $this->security->generateToken(new DefaultModel());
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/token");
    }

    public function logout() {
        $this->security->deactivate();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/token");
    }

    public function token() {
        var_dump($this->security->acceptConnexion());
    }
}
    
