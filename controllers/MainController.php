<?php
require('Controller.php');

class MainController implements Controller{

    public function handle($request){
        $_SESSION['error']= "</br>";  
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            $_SESSION['message']= '
            Bienvenue, '. $_SESSION["Name"] .' ! </br></br>
            <a href="index.php?page=user_disconnect">Deconnection</a>
            <a href="index.php?page=user_edit_form">Editer le profil</a>
            <a href="index.php?page=upload_activity_form">Upload une activité</a>
            <a href="index.php?page=list_activities">Lister les activités</a>';
        } else {
            $_SESSION['message']= '
            Veuillez Créer un profil ou vous connecter </br></br>
            <a href="index.php?page=user_add_form">Creation de profil</a>
            <a href="index.php?page=user_connect_form">Connexion</a>';
        }
        
    }
}
?>
