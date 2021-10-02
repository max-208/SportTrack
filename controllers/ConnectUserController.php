<?php
require('Controller.php');
require('model/User.php');
require('model/UserDAO.php');

class ConnectUserController implements Controller{

    public function handle($request){
        header( "refresh:3;url=index.php?page=/" );
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            $_SESSION['message']= "Vous êtes déja connecté, vous serez redirigé vers l'acceuil dans 3 secondes</br>";
        } else {
            $newUser = UserDAO::getInstance()->findUser($request['FMail'],$request['FPassword']);
            if (count($newUser) > 0){
                $_SESSION["loggedin"] = true;
                $_SESSION["Email"] = $newUser[0]->getEmail();
                $_SESSION["Name"] = $newUser[0]->getSurname();
                $_SESSION['message']= "Connection reussie, vous serez redirigé vers l'acceuil dans 3 secondes</br>";   
            } else {
                $_SESSION['message']= "Connection échouée, vous serez redirigé vers l'acceuil dans 3 secondes</br>";  
            }
        }
    }

}
?>