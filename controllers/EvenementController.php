<?php
namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\EvenementModel;
use BWB\Framework\mvc\models\AdresseModel;
use BWB\Framework\mvc\dao\DAOEvenement;
use BWB\Framework\mvc\dao\DAOTruckEvenement;
use BWB\Framework\mvc\dao\DAOMap;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\dao\DAOUtilisateur;

require 'CheckURI.php';

class EvenementController extends Controller {

    private $evenement;

    public function __construct(){
        parent::__construct();
        $this->securityLoader();
        $this->evenement = new DAOEvenement();
    }

    public function addEvent(){
        
        //CHECK SECURITY

        if(checkMe($this->security->acceptConnexion(),$_SERVER['REQUEST_URI'])){
            //Requp des infos du formulaire
            $dataPost = $this->inputPost();

            if(isset($dataPost['intitule'])){

                //Recup des coordonnees GPS de la nouvelle adresse
                $coord = (new DAOMap())->giveMeTheGPS($dataPost['adresseEvent']);
                
                //Creation d'un objet Adresse
                $newAdresse = new AdresseModel();
                $newAdresse->setAdresse($dataPost['adresseEvent']);
                $newAdresse->setLatitude($coord['lat']);
                $newAdresse->setLongitude($coord['lng']);

                //REC adresse et Recupération de l'id de l'adresse crée
                $newIdAdresse = (new DAOAdresse())->create($newAdresse);

                //Check et creation de la date au format SQL DATE DEBUT
                if($dataPost['dateDebut'] !== "" AND $dataPost['heureDebut'] !== ""){
                    $dateRequest = $dataPost['dateDebut']." ".$dataPost['heureDebut'];
                    $dateDebutFull = date_format(date_create_from_format('d/m/Y H:i', $dateRequest), 'Y-m-d H:i');
                }else if($dataPost['dateDebut'] !== ""){
                    $dateRequest = $dataPost['dateDebut']." ".date("H:i:s");
                    $dateDebutFull = date_format(date_create_from_format('d/m/Y H:i', $dateRequest), 'Y-m-d H:i');
                }else if($dataPost['heureDebut'] !== ""){
                    $dateDebutFull = date("Y-m-d")." ".$dataPost['heureDebut'];
                }else{
                    $dateDebutFull = date("Y-m-d H:i");
                }

                //Check et creation de la date au format SQL DATE FIN
                if($dataPost['dateFin'] !== "" AND $dataPost['heureFin'] !== ""){
                    $dateRequest = $dataPost['dateFin']." ".$dataPost['heureFin'];
                    $dateFinFull = date_format(date_create_from_format('d/m/Y H:i', $dateRequest), 'Y-m-d H:i');
                }else if($dataPost['dateFin'] !== ""){
                    $dateRequest = $dataPost['dateFin']." ".date("H:i:s");
                    $dateFinFull = date_format(date_create_from_format('d/m/Y H:i', $dateRequest), 'Y-m-d H:i');
                }else if($dataPost['heureFin'] !== ""){
                    $dateFinFull = date("Y-m-d")." ".$dataPost['heureFin'];
                }else{
                    $dateFinFull = date("Y-m-d H:i");
                }

                //Gestion image
                if(isset($dataPost['imageEvent'])){
                    $image = 'default.png';
                }else{
                    $image = $dataPost['imageEvent'];
                }

                //Creation d'un objet Evenement
                $newEvent = new EvenementModel();
                $newEvent->setDate_creation(date('Y-m-d H:i'));
                $newEvent->setIntitule($dataPost['intitule']);
                $newEvent->setDate_debut($dateDebutFull);
                $newEvent->setDate_fin($dateFinFull);
                $newEvent->setDescription($dataPost['description']);
                $newEvent->setImage($image);
                $newEvent->setNombreDeParticipant($dataPost['nbPersonnes']);
        
                $newItem = (new DAOUtilisateur())->retrieve($dataPost['idUser']);
                $newEvent->setUtilisateur_Id($newItem);
        
                $newItem = (new DAOAdresse())->retrieve($newIdAdresse);
        
                $newEvent->setAdresse_id($newItem);

                //REC BDD
                $result = $this->evenement->create($newEvent);

                //Redirection vers page Event
                header("Location: http://".$_SERVER['SERVER_NAME']."/evenement/".$result);

            }else{
                $this->render('formulaire_event');  
            }
        }else{
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/");
        }
    }

    public function showListEvents(){

        //recup liste Events en objets
        $listeEventsObj = $this->evenement->getAll();

        //Creation des tableaux Event + nb de FT participants
        $listeEvents = [];
        foreach($listeEventsObj as $event){

            $newCouple = [
                'event' => $event->jsonSerialize(),
                'nbFT' => count((new DAOTruckEvenement())->trucksForEvent($event->getId()))
            ];
            array_push($listeEvents,$newCouple);
        }

        //Var $datas
        $datas = ['listEvents' => $listeEvents];

        $this->render('listeEvents',$datas);
    }

    public function showEvent($id){

        //recup des infos
        $thisEvent = $this->evenement->retrieve($id)->jsonSerialize();

        //Recup de la liste des FT participants
        $listeFTObj = (new DAOTruckEvenement())->trucksForEvent($id);
        $listeFT = [];
        foreach($listeFTObj as $truck){
            array_push($listeFT,$truck->jsonSerialize());
        }

        //Var $datas
        $datas = ['event' => $thisEvent, 'listeFT' => $listeFT];

        $this->render('event',$datas);
    }

    public function getAllJSON(){
        header("Content-type: application/json");
        echo json_encode($this->evenement->getAll());
    }

    public function retrieve($id){
        return $this->evenement->retrieve($id);
    }

    public function getAll(){
        return $this->evenement->getAll();
    }

    public function getAllBy($filter){
        return $this->evenement->getAllBy($filter);
    }

    public function getLastFive(){
        return $this->evenement->getLastFive();
    }

    public function create($newEvenement){
        return $this->evenement->create($newEvenement);
    }

    public function delete($id){
        return $this->evenement->delete($id);
    }

    public function updateMe($idUser,$newValeurs){
        return $this->evenement->updateMe($idUser,$newValeurs);
    }

    public function update($newValeurs){
        return $this->evenement->update($newValeurs);
    }

    public function getEvenementFive(){
        return $this->evenement->getEvenementFive();
    }

    public function testMe(){
        $this->render('test');
    }

}