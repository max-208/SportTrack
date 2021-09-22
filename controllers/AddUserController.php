<?php
require('Controller.php');
require("./model/User.php");
require("./model/UserDAO.php");

class AddUserController implements Controller{

    public function handle($request){
        print_r($request);
        $_SESSION['message']= 'Add User:';
        $user = new User();
        $user->init($request['FMail'],$request['FName'],$request['FSurname'],$request['FDate'],$request['FSex'],$request['FHeight'],$request['FWeight'],$request['FPassword']);
        UserDAO::getInstance()->insert($user);
        
    }


}
?>
