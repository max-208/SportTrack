<?php
require('Controller.php');

class ModifUserController implements Controller{

    public function handle($request,$user){
        #$_SESSION['message']= 'Modification des informations personelles User:';
        
        // UserDAO::get_instance()->delete($user);
        
        $user->init($request['Email'],$request['Name'],$request['Surname'],$request['BirthDate'],$request['Gender'],$request['Height'],$request['Weight'],$request['Password']);
        UserDAO::get_instance()->insert($user);
        
    }


}
?>