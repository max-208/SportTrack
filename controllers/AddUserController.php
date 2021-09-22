<?php
require('Controller.php');
require("./model/User.php");
require("./model/UserDAO.php");

class AddUserController implements Controller{

    public function handle($request){
        $_SESSION['message']= 'Add User:';
        $user = new User();
        $user->init($request['Email'],$request['Name'],$request['Surname'],$request['BirthDate'],$request['Gender'],$request['Height'],$request['Weight'],$request['Password']);
        UserDAO::get_instance()->insert($user);
        
    }


}
?>
