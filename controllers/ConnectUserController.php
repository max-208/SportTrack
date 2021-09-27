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
            $user = new User();
            $user->init($request['FMail'],null,null,null,null,null,null,$request['FPassword']);
            print_r($user);
            $newUser = UserDAO::getInstance()->findUser($user);
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