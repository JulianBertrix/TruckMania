<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUtilisateur;
use BWB\Framework\mvc\models\UtilisateurModel;
use BWB\Framework\mvc\models\AdresseModel;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\dao\DAORole;
use BWB\Framework\mvc\dao\DAOTrucks;
use BWB\Framework\mvc\dao\DAOCategorie;
use BWB\Framework\mvc\dao\DAOMap;
use BWB\Framework\mvc\models\RoleModel;
use BWB\Framework\mvc\models\TrucksModel;


class InscriptionsController extends Controller{

    private $newUser;
    
    public function __construct(){
        parent::__construct();
        $this->securityLoader();
        $this->newUser = new DAOUtilisateur();    
    }

    public function inscritMoi($type){
        
        //Requp des infos du formulaire
        $dataPost = $this->inputPost();

        if(isset($dataPost['nom'])){

            //Recup des coordonnees GPS de la nouvelle adresse
            $coord = (new DAOMap())->giveMeTheGPS($dataPost['user_input_autocomplete_address']);
            
            //Creation d'un objet Adresse
            $newAdresse = new AdresseModel();
            $newAdresse->setAdresse($dataPost['user_input_autocomplete_address']);
            $newAdresse->setLatitude($coord['lat']);
            $newAdresse->setLongitude($coord['lng']);

            //REC adresse et Recupération de l'id de l'adresse crée
            $newIdAdresse = (new DAOAdresse())->create($newAdresse);

            //Hashage du password
            $hashPwd = hash("sha1",$dataPost['mot_de_passe']);
            
            //Creation d'un objet Utilisateur
            $newUtilisateur = new UtilisateurModel();
            $newUtilisateur->setNom($dataPost['nom']);
            $newUtilisateur->setPrenom($dataPost['prenom']);
            $newUtilisateur->setEmail($dataPost['email']);
            $newUtilisateur->setMotDePasse($hashPwd);
            $newUtilisateur->setDateCreation(date('Y-m-d H:i:s'));
            $newUtilisateur->setAdresseId((new DAOAdresse())->retrieve($newIdAdresse));
            
            //Ajout du bon objet Role et si FT, creation de l'objet FT
            if($type === 'client'){
                $newUtilisateur->setRoleId((new DAORole())->retrieve(3));
                $newUtilisateur->setFoodTruckId(0);
            }else if($type === 'truck'){
                $newUtilisateur->setRoleId((new DAORole())->retrieve(4));

                //Objet FT
                $filtre = ['intitule' => $dataPost['catrequest']]; //ID de la categorie
                $idCat = (new DAOCategorie())->getAllBy($filtre)[0]->getId();

                $truck = new TrucksModel($id = null, $siret = $dataPost['siret'], $nom = $dataPost['nomtrucks'], $logo = "default.png", $categorieId = $idCat, $moyenne = 0);

                //REC FT et recupération de l'id crée
                $newIdTruck = (new DAOTrucks())->create($truck);

                //Enregistrement dans User
                $newUtilisateur->setFoodTruckId((new DAOTrucks())->retrieve($newIdTruck));
            }

            //REC BDD
            $result = $this->newUser->create($newUtilisateur);

            //Si succès, login automatique du user
            if($result['nbLignes'] === 1){
                //recup de l'id créé
                $newId = $result['newId'];

                //Connexion
                $this->security->deactivate();
                $utilisateur = (new DAOUtilisateur())->retrieve($newId);
                $this->security->generateToken($utilisateur);
            }

            //Redirection Home
            header("Location: http://" . $_SERVER['SERVER_NAME']. "/");

        }else{
            if($type === 'client'){
                $this->render('formulaire_inscription');
            }else if($type === 'truck'){
                $datas = ['listeCat' => (new CategorieController())->getAllCategorie()];
                $this->render('formulaire_trucks',$datas);
            }
             
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
    
