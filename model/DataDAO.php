<?php
require_once('SqliteConnection.php');
class DataDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
       if(!isset(self::$dao)) {
           self::$dao= new DataDAO();
       }
       return self::$dao;
    }

    public final function findAll(){
       $dbc = SqliteConnection::getInstance()->getConnection();
       $query = "select * from data order by IdData";
       $stmt = $dbc->query($query);
       $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Data');
       return $results;
    }

    public final function getMaxId(){
       $dbc = SqliteConnection::getInstance()->getConnection();
       $query = "select MAX(IdData) as max from data";
       $stmt = $dbc->query($query);
       $results = $stmt->fetchAll();
       #print_r($results);
       $ret = 0;
       if( $results[0]['max'] != NULL){
           $ret = $results[0]['max'] + 1;
       }
       return $ret;
    }

   public final function insert($obj){
      if($obj instanceof Data){
         $dbc = SqliteConnection::getInstance()->getConnection();
         // prepare the SQL statement
         $query = "insert into data( IdData, Time, Cardio, Latitude, Longitude, Altitude, PreviousData, TheActivity ) values (:id, :ti, :ca, :la, :lo, :al, :pr, :th)";
         $stmt = $dbc->prepare($query);

         // bind the paramaters
         $stmt->bindValue(':id',$obj->getIdData(),PDO::PARAM_STR);
         $stmt->bindValue(':ti',$obj->getTime(),PDO::PARAM_STR);
         $stmt->bindValue(':ca',$obj->getCardio(),PDO::PARAM_STR);
         $stmt->bindValue(':la',$obj->getLatitude(),PDO::PARAM_STR);
         $stmt->bindValue(':lo',$obj->getLongitude(),PDO::PARAM_STR);
         $stmt->bindValue(':al',$obj->getAltitude(),PDO::PARAM_STR);
         $stmt->bindValue(':pr',$obj->getPreviousData(),PDO::PARAM_STR);
         $stmt->bindValue(':th',$obj->getTheActivity(),PDO::PARAM_STR);

         // execute the prepared statement
         try{
            $stmt->execute();
         } catch(Exception $e){
             echo "DataDAO insert : exception recue : ".$e->getMessage()."\xA" ;
         }
     }
  }

  public function delete($obj){
    if($obj instanceof Data){
        $dbc = SqliteConnection::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "delete from data where IdData = :id";
        $stmt = $dbc->prepare($query);

        // bind the paramaters
        $stmt->bindValue(':id',$obj->getIdData(),PDO::PARAM_STR);
        
        // execute the prepared statement
        try{
            $stmt->execute();
            unset($obj);
         } catch(Exception $e){
             echo "DataDAO delete : exception recue : ".$e->getMessage()."\xA" ;
         }
    }
    }

  public function update($oldObj, $newObj){
    if($oldObj instanceof Data && $newObj instanceof Data){
        $dbc = SqliteConnection::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "update data set IdData = :newid, Time = :newti, Cardio = :newca, Latitude = :newla, Longitude = :newlo, Altitude = :newal, PreviousData = :newpr, TheActivity = :newth where IdData = :oldid";
        $stmt = $dbc->prepare($query);

        // bind the paramaters
        $stmt->bindValue(':oldid',$oldObj->getIdData(),PDO::PARAM_STR);

        $stmt->bindValue(':newid',$newObj->getIdData(),PDO::PARAM_STR);
        $stmt->bindValue(':newti',$newObj->getTime(),PDO::PARAM_STR);
        $stmt->bindValue(':newca',$newObj->getCardio(),PDO::PARAM_STR);
        $stmt->bindValue(':newla',$newObj->getLatitude(),PDO::PARAM_STR);
        $stmt->bindValue(':newlo',$newObj->getLongitude(),PDO::PARAM_STR);
        $stmt->bindValue(':newal',$newObj->getAltitude(),PDO::PARAM_STR);
        $stmt->bindValue(':newpr',$newObj->getPreviousData(),PDO::PARAM_STR);
        $stmt->bindValue(':newth',$newObj->getTheActivity(),PDO::PARAM_STR);

        // execute the prepared statement
        try{
            $stmt->execute();
            $oldObj = $newObj;
         } catch(Exception $e){
             echo "DataDAO update : exception recue : ".$e->getMessage()."\xA" ;
         }

    }
}
}
?>
