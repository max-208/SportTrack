<?php
require('Controller.php');
require('model/User.php');
require('model/UserDAO.php');

class ConnectUserController implements Controller{

    public function handle($request){
        
        $_SESSION['message']= 'Connect User:';
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            $_SESSION['message']= "Personne déjà connectée";
        } else {
            echo("</br>");
            echo("</br>tout les user : ");
            print_r(UserDAO::getInstance()->findAll());
            echo("</br>");
            echo("</br>User cherché : ");
            print($request['FMail']);
            echo("      ");
            print($request['FPassword']);
            $newUser = UserDAO::getInstance()->findUser($request['FMail'],$request['FPassword']);
            echo("</br>");
            echo("</br>User trouvé : ");
            print_r($newUser);
            if (count($newUser) > 0){
                $_SESSION["loggedin"] = true;
                $_SESSION['message']= "Connection reussie";   
            } else {
                $_SESSION['message']= "Connection échouée";  
            }
        }
    }

}
?>