<?php
require('Controller.php');

class DisconnectUserController implements Controller{

    public function handle($request){
        header( "refresh:3;url=index.php?page=/" );
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            $_SESSION['message']= "deconnection reussie, vous serez redirigé vers l'accueil dans 3 secondes</br>";   
            session_destroy(); 
        } else {
            $_SESSION['message']= "Personne n'est connectée, vous serez redirigé vers l'accueil dans 3 secondes</br>";   
        }
    }
}
?>