<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    class SqliteConnection {

        private static $SqliteConnection;

        private function __construct() {}
        
        public final static function getInstance() {
            if(!isset(self::$SqliteConnection)) {
                self::$SqliteConnection= new SqliteConnection();
            }
            return self::$SqliteConnection;
        }

        public final function getConnection(){
            try{
                $db = new PDO('sqlite:/home/maxime/Documents/m3104-web-serveur/SpotTrack/model/sport_track.db'); // , array(PDO::ATTR_PERSISTENT => true));
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->setAttribute(PDO::ATTR_PERSISTENT, true);
                return $db;
            } catch (PDOEsception $e) {
                print "error!:" . $e->getMessage() . "<br/>";
                die();
            }
        }
    }
?>