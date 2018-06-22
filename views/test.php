<?php
<<<<<<< HEAD
include 'header.php';
use BWB\Framework\mvc\controllers\UtilisateurController;
$newUser = new UtilisateurController();
$toto = $newUser->retrieve(5);

$tutu = $newUser->create($toto);
?>
=======
    use BWB\Framework\mvc\controllers\EvenementController;
    
?>

<table style="width:100%">
<?php 

    $evenements = (new EvenementController())->getEvenementFive();
    
    foreach($evenements as $evenement){
        
        echo '
                <tr>
                    <td>'.$evenement->getId().'</td>
                    <td>'.$evenement->getDate_Creation().'</td>
                    <td>'.$evenement->getIntitule().'</td>
                    <td>'.$evenement->getDate_Debut().'</td>
                    <td>'.$evenement->getDate_Fin().'</td>
                    <td>'.$evenement->getDescription().'</td>
                </tr>';
            
    }
 ?>
 </table>
 
>>>>>>> evenement
