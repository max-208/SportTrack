<?php
require_once('SqliteConnection.php');
class ActivityDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
       if(!isset(self::$dao)) {
           self::$dao= new ActivityDAO();
       }
       return self::$dao;
    }

    public final function findAll(){
       $dbc = SqliteConnection::getInstance()->getConnection();
       $query = "select * from Activity order by IdActivity";
       $stmt = $dbc->query($query);
       $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
       return $results;
    }

   public final function insert($obj){
      if($obj instanceof Activity){
         $dbc = SqliteConnection::getInstance()->getConnection();
         // prepare the SQL statement
         $query = "insert into activity( IdActivity, Date, Description, TheUser, MaxCardio, MinCardio, AverageCardio, BegginingTime, Duration ) values (:id , :da ,:de ,:th ,:ma ,:mi ,:av ,:be ,:du)";
         $stmt = $dbc->prepare($query);

         // bind the paramaters
         $stmt->bindValue(':id',$obj->getIdActivity(),PDO::PARAM_STR);
         $stmt->bindValue(':da',$obj->getDate(),PDO::PARAM_STR);
         $stmt->bindValue(':de',$obj->getDescription(),PDO::PARAM_STR);
         $stmt->bindValue(':th',$obj->getTheUser(),PDO::PARAM_STR);
         $stmt->bindValue(':ma',$obj->getMaxCardio(),PDO::PARAM_STR);
         $stmt->bindValue(':mi',$obj->getMinCardio(),PDO::PARAM_STR);
         $stmt->bindValue(':av',$obj->getAverageCardio(),PDO::PARAM_STR);
         $stmt->bindValue(':be',$obj->getBegginingTime(),PDO::PARAM_STR);
         $stmt->bindValue(':du',$obj->getDuration(),PDO::PARAM_STR);

         // execute the prepared statement
         try{
            $stmt->execute();
         } catch(Exception $e){
             echo "ActivityDAO insert : exception recue : ".$e->getMessage()."\xA" ;
         }
     }
  }

  public function delete($obj){
    if($obj instanceof Activity){
        $dbc = SqliteConnection::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "delete from activity where IdActivity = :id";
        $stmt = $dbc->prepare($query);

        // bind the paramaters
         $stmt->bindValue(':id',$obj->getIdActivity(),PDO::PARAM_STR);
        
        // execute the prepared statement
        try{
            $stmt->execute();
            unset($obj);
         } catch(Exception $e){
             echo "ActivityDAO delete : exception recue : ".$e->getMessage()."\xA" ;
         }
    }
    }

  public function update($oldObj, $newObj){
    if($oldObj instanceof Activity && $newObj instanceof Activity){
        $dbc = SqliteConnection::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "update activity set IdActivity = :newid, Date = :newda, Description = :newde, TheUser = :newth, MaxCardio = :newma, MinCardio = :newmi, AverageCardio = :newav, BegginingTime = :newbe, Duration = :newdu where IdActivity = :oldid";
        $stmt = $dbc->prepare($query);

        // bind the paramaters
        $stmt->bindValue(':oldid',$oldObj->getIdActivity(),PDO::PARAM_STR);

        $stmt->bindValue(':newid',$newObj->getIdActivity(),PDO::PARAM_STR);
        $stmt->bindValue(':newda',$newObj->getDate(),PDO::PARAM_STR);
        $stmt->bindValue(':newde',$newObj->getDescription(),PDO::PARAM_STR);
        $stmt->bindValue(':newth',$newObj->getTheUser(),PDO::PARAM_STR);
        $stmt->bindValue(':newma',$newObj->getMaxCardio(),PDO::PARAM_STR);
        $stmt->bindValue(':newmi',$newObj->getMinCardio(),PDO::PARAM_STR);
        $stmt->bindValue(':newav',$newObj->getAverageCardio(),PDO::PARAM_STR);
        $stmt->bindValue(':newbe',$newObj->getBegginingTime(),PDO::PARAM_STR);
        $stmt->bindValue(':newdu',$newObj->getDuration(),PDO::PARAM_STR);

        // execute the prepared statement
        try{
            $stmt->execute();
            $oldObj = $newObj;
         } catch(Exception $e){
             echo "ActivityDAO update : exception recue : ".$e->getMessage()."\xA" ;
         }

    }
}
}
?>
