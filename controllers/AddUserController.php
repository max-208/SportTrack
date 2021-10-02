<?php
require('Controller.php');
require("./model/User.php");
require("./model/UserDAO.php");

class AddUserController implements Controller{

    public function handle($request){
        $_SESSION['error']= "</br>";  
        $user = new User();
        $user->init($request['FMail'],$request['FName'],$request['FSurname'],$request['FDate'],$request['FSex'],$request['FHeight'],$request['FWeight'],$request['FPassword']);
        try{
            UserDAO::getInstance()->insert($user);
            $_SESSION["loggedin"] = true;
            $_SESSION["Email"] = $request['FMail'];
            $_SESSION["Name"] = $request['FName'];
            header( "refresh:10;url=index.php?page=/",true,302);
            $_SESSION['message']= 'Création de compte réussie, bienvenue, '.$request['FSurname'].", vous serez redirigé vers l'accueil dans 10 secondes</br>";
        } catch (exception $e) {
            header( "refresh:0;url=index.php?page=user_add_form",true,302 );
            $_SESSION['error']= '</br>Oh, non il semblerai que le compte '.$request['FMail']."existe deja ou que votre mot de passe n'est pas conforme. </br></br>";
        }
        
    }


}
?>
