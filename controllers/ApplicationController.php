<?php
class ApplicationController{
    private static $instance;
    private $routes;
    
    private function __construct(){
        // Sets the controllers and the views of the application.
        $this->routes = [
            '/' => ['controller'=>'MainController', 'view'=>'MainView'],
            'user_add' => ['controller'=>'AddUserController', 'view'=>'AddUserValidationView'],
            'user_connect' => ['controller'=>'ConnectUserController', 'view'=>'ConnectUserValidationView'],
            'user_edit' => ['controller'=>'EditUserController', 'view'=>'EditUserValidationView'],
            'user_disconnect' => ['controller'=>'DisconnectUserController', 'view'=>'DisconnectUserVue'],
            'upload_activity' => ['controller'=>'UploadActivityController', 'view'=>'uploadActivityValidation'],
            'list_activities' => ['controller'=>'ListActivityController', 'view'=>'ListActivityView'],
            'user_add_form' => ['controller'=>null, 'view'=>'AddUserForm'],
            'user_connect_form' => ['controller'=>null, 'view'=>'ConnectUserForm'],
            'user_edit_form' => ['controller'=>null, 'view'=>'EditUserForm'],
            'upload_activity_form' => ['controller'=>null, 'view'=>'UploadActivityForm'],
            'error' => ['controller'=>null, 'view'=>'ErrorView']
        ];
    }

    /**
     * Returns the single instance of this class.
     * @return ApplicationController the single instance of this class.
     */
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new ApplicationController;
        }
        return self::$instance;
    }

    /**
     * Returns the controller that is responsible for processing the request
     * specified as parameter. The controller can be null if their is no data to
     * process.
     * @param Array $request The HTTP request.
     * @param Controller The controller that is responsible for processing the
     * request specified as parameter.  
     */
    public function getController($request){
        $_SESSION['message']= "</br>";
        if($request != null && array_key_exists($request['page'], $this->routes)){
            return $this->routes[$request['page']]['controller'];
        }
        return $this->routes["/"]['controller'];
    }

    /**
     * Returns the view that must be return in response of the HTTP request
     * specified as parameter.  
     * @param Array $request The HTTP request.
     * @param Object The view that must be return in response of the HTTP request
     * specified as parameter. 
     */
    public function getView($request){
        if( $request != null && array_key_exists($request['page'], $this->routes)){
            return $this->routes[$request['page']]['view'];
        }  
        return $this->routes['/']['view'];
    }
}
?>
