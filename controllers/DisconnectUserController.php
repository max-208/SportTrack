<?php
require('Controller.php');

class ConnectUserController implements Controller{

    public function handle($request){
        $_SESSION['message']= 'Disconnect User:';
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
             $_SESSION["loggedin"] = false;
            $_SESSION['message']= "deconnection reussie";    
        } else {
            $_SESSION['message']= "Personne n'est connectée";   
    }
}
?>