<?php
require('Controller.php');

class DisconnectUserController implements Controller{

    public function handle($request){
        $_SESSION['message']= 'Disconnect User:';
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            $_SESSION["loggedin"] = false;
            $_SESSION["Email"] = "";
            $_SESSION['message']= "deconnection reussie";   
            session_destroy(); 
        } else {
            $_SESSION['message']= "Personne n'est connectée";   
        }
    }
}
?>