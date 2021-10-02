<?php
require('Controller.php');
require("./model/User.php");
require("./model/UserDAO.php");

class AddUserController implements Controller{

    public function handle($request){
        $user = new User();
        $user->init($request['FMail'],$request['FName'],$request['FSurname'],$request['FDate'],$request['FSex'],$request['FHeight'],$request['FWeight'],$request['FPassword']);
        try{
            UserDAO::getInstance()->insert($user);
            $_SESSION["loggedin"] = true;
            $_SESSION["Email"] = $request['FMail'];
            $_SESSION["Name"] = $request['FName'];
            //header( "refresh:10;url=index.php?page=/" );
            $_SESSION['message']= 'Création de compte réussie, bienvenue, '.$request['FSurname'].", vous serez redirigé vers l'acceuil dans 10 secondes</br>";
        } catch (exception $e) {
            //header( "refresh:10;url=index.php?page=user_add_form" );
            $_SESSION['message']= 'Oh, non il semblerai que le compte '.$request['Email']."Existe deja ! </br> Vous serez redirigé vers la page de création de compte dans 10 secondes </br>";
        }
        
    }


}
?>
