<?php
require('Controller.php');
require('model/User.php');
require('model/UserDAO.php');

class ConnectUserController implements Controller{

    public function handle($request){
        $_SESSION['message']= 'Disconnect User:';
        $user = new User();
        $user->init($request['FMail'],null,null,null,null,null,null,$request['FPassword']);
        UserDAO::getInstance()->delete($user);
        
    }


}
?>