<?php
require('Controller.php');

class ConnectUserController implements Controller{

    public function handle($request){
        $_SESSION['message']= 'Disconnect User:';
        $user = new User();
        $user->init($request['Email'],$request['Name'],$request['Surname'],$request['BirthDate'],$request['Gender'],$request['Height'],$request['Weight'],$request['Password']);
        UserDAO::get_instance()->delete($user);
        
    }


}
?>