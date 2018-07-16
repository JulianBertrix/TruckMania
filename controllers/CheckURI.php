<?php
/**
 * Check de la connexion effective avec $this->security->acceptConnexion()
 * En fonction des données et de l'URI demandée, si autorisée => render de la page sinon redirection vers home
 */

 //object(stdClass)#6 (3) { ["username"]=> array(3) { [0]=> string(1) "4" [1]=> string(8) "Juliette" [2]=> NULL } 
 //["roles"]=> array(1) { [0]=> string(5) "admin" } ["exp"]=> int(1530958381) } 

function checkMe($connexion,$uri){

    $result = false;

    //Check connexion
    if($connexion !== false){

        //Check du role et de l'uri

        switch($uri){

            case '/profile/'.$connexion->username[0]: //Accès à son profil
                $result = true;
                break;
            
            case '/user/'.$connexion->username[0].'/truck/'.$connexion->username[2]: //Accès au profil admin d'un FT
                $result = true;
                break;

            case '/administration/trucks': //Accès à page administration du site
            case '/administration/users':
            case '/administration/evenement':
            case '/administration/commande':

                if($connexion->roles[0] === "admin"){
                    $result = true;
                }
                break;

            case '/evenement/add':

                if($connexion->roles[0] === "pro"){
                    $result = true;
                }
                break;

            default:
                break;
        }
    }

    return $result;
}

?>