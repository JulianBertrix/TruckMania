<?php
/**
 * Check de la connexion effective avec $this->security->acceptConnexion()
 * En fonction des données et de l'URI demandée, si autorisée => render de la page sinon redirection vers home
 */

 //object(stdClass)#6 (3) { ["username"]=> array(3) { [0]=> string(1) "4" [1]=> string(8) "Juliette" [2]=> NULL } 
 //["roles"]=> array(1) { [0]=> string(5) "admin" } ["exp"]=> int(1530958381) } 

function checkMe($connexion,$uri){

    $result = false;

    //Accès aux pages visibles pour tout le monde
    if($uri === '/' || $uri === '/inscription' || $uri === '/inscriptionTrucks'){
        return true;
    }else{
        //Check connexion
    if($connexion !== false){

        //Check du role et de l'uri
        if($uri === '/'){

            return true;    //Tout le monde accède à Home

        }else{

            switch($connexion->roles[0]){

                case 'utilisateur':
    
                    switch($uri){
    
                        case 'profile'.$connexion->username[0]: //Accès à son profil
                            return true;
                            break;
                        

                    }

            }
        }
        

        $result = true;
    }
    }

    //Accès aux uri /foodtrucks/


    

    return $result;
}

?>