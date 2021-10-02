<?php
require('Controller.php');
require('model/User.php');
require('model/UserDAO.php');

class EditUserController implements Controller{

    public function handle($request){
        $_SESSION['error']= "</br>";  
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            $oldUser = UserDAO::getInstance()->findUser($request['FOldMail'],$request['FOldPassword']);
            if(count($oldUser)>0){
                $newUser = new User();
                if( $request[ "FMail" ] != NULL )       {$M = $request[ "FMail" ]; }       else { $M = $oldUser[0]->getEmail(); } 
                if( $request[ "FName" ] != NULL )       { $N = $request[ "FName" ]; }      else { $N = $oldUser[0]->getName(); } 
                if( $request[ "FSurname" ] != NULL )    { $S = $request[ "FSurname" ]; }   else { $S = $oldUser[0]->getSurname(); } 
                if( $request[ "FDate" ] != NULL )       { $B = $request[ "FDate" ]; }      else { $B = $oldUser[0]->getBirthDate(); } 
                if( $request[ "FSex" ] != NULL )        { $G = $request[ "FSex" ]; }       else { $G = $oldUser[0]->getGender(); } 
                if( $request[ "FHeight" ] != NULL )     { $H = $request[ "FHeight" ]; }    else { $H = $oldUser[0]->getHeight(); } 
                if( $request[ "FWeight" ] != NULL )     { $W = $request[ "FWeight" ]; }    else { $W = $oldUser[0]->getWeight(); } 
                if( $request[ "FPassword" ] != NULL )   { $P = $request[ "FPassword" ]; }  else { $P = $oldUser[0]->getPassword(); } 
                $newUser->init($M, $N, $S, $B, $G, $H, $W, $P);
                UserDAO::getInstance()->update($oldUser,$newUser);
                $_SESSION['Email'] = $M;
                $_SESSION['Name'] = $S;
                header( "refresh:3;url=index.php?page=/",true,302 );
                $_SESSION['message'] = "modification de profil reussie, vous serez redirigé vers l'accueil dans 3 secondes</br>";
            } else {
                header( "refresh:0;url=index.php?page=user_edit_form",true,302 );
                $_SESSION['error'] = '</br><div class = "w3-container w3-red"><p>erreur de connection : email ou mot de passe erroné</p></div></br>';
            }
        } else {
            header( "refresh:0;url=index.php?page=/",true,302 );
        }
    }

}
?>