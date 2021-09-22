<?php
require('Controller.php');

class MainController implements Controller{

    public function handle($request){
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            $_SESSION['message']= "deja connecte";
        } else {
            if(isset($_POST["FMail"]) && $_POST["FMail"] == "test@mail.com"){ // TODO : remplacer par la verification BDD
                $_SESSION["loggedin"] = true;
                $_SESSION['message']= "connection reussie";
            } else {
                $_SESSION['message']= "connection non reussie";
            }
        }
        
    }
}
?>
