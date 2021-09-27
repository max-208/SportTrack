<?php
require('Controller.php');
require('model/User.php');
require('model/UserDAO.php');

class ConnectUserController implements Controller{

    public function handle($request){
        $user = new User();
        $user->init($request['FMail'],null,null,null,null,null,null,$request['FPassword']);
        $_SESSION['message']= 'Connect User:';
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            $_SESSION['message']= "Personne déjà connectée";
        } else {
            $info = UserDAO::getInstance()->findUser($user);
            if ($info == true){
                $_SESSION["loggedin"] = true;
                $_SESSION['message']= "Connection reussie";   
            }
        }
    }

}
?>