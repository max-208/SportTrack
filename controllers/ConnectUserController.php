<?php
require('Controller.php');
require('model/User.php');
require('model/UserDAO.php');

class ConnectUserController implements Controller{

    public function handle($request){
        $_SESSION['error']= "</br>";  
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            header( "refresh:3;url=index.php?page=/",true,302 );
            $_SESSION['message']= "Vous êtes déja connecté, vous serez redirigé vers l'accueil dans 3 secondes</br>";
        } else {
            $newUser = UserDAO::getInstance()->findUser($request['FMail'],$request['FPassword']);
            if (count($newUser) > 0){
                $_SESSION["loggedin"] = true;
                $_SESSION["Email"] = $newUser[0]->getEmail();
                $_SESSION["Name"] = $newUser[0]->getSurname();
                header( "refresh:3;url=index.php?page=/",true,302 );
                $_SESSION['message']= "Connection reussie, vous serez redirigé vers l'accueil dans 3 secondes</br>";
            } else {
                header( "refresh:0;url=index.php?page=user_connect",true,302 );
                $_SESSION['error']= "</br>Connection échouée, veuillez réésayer</br></br>";
            }
        }
    }

}
?>