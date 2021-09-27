<?php
require_once('SqliteConnection.php');
class UserDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
       if(!isset(self::$dao)) {
           self::$dao= new UserDAO();
       }
       return self::$dao;
    }

    public final function find($obj){
        $results = null;
        if($obj instanceof User && null !== $obj->getEmail() && null !== $obj->getPassword() ){
            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "select * from user WHERE Email = :E AND Password = :P";
            $stmt = $dbc->query($query);
            $stmt->bindValue(':E',$obj->getEmail(),PDO::PARAM_STR);
            $stmt->bindValue(':P',$obj->getPassword(),PDO::PARAM_STR);
            $results = $stmt->fetch(PDO::FETCH_CLASS, 'User');
        }
        return $results;
    }

    public final function findAll(){
       $dbc = SqliteConnection::getInstance()->getConnection();
       $query = "select * from user order by Email";
       $stmt = $dbc->query($query);
       $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
       return $results;
    }


    public final function findUser($user){
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from user where Email = :E and Password = :P";
        $stmt = $dbc->query($query);
        $stmt->bindValue(':E',$user->getEmail(),PDO::PARAM_STR);
        $stmt->bindValue(':P',$user->getPassword(),PDO::PARAM_STR);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        
        if (str$results)
        return $results;
     }

   public final function insert($st){
      if($st instanceof User){
         $dbc = SqliteConnection::getInstance()->getConnection();
         // prepare the SQL statement
         $query = "insert into user( Email, Name, Surname, BirthDate, Gender, Height, Weight, Password ) values (:E, :N, :S, :B, :G, :H, :W, :P)";
         $stmt = $dbc->prepare($query);

         // bind the paramaters
         $stmt->bindValue(':E',$st->getEmail(),PDO::PARAM_STR);
         $stmt->bindValue(':N',$st->getName(),PDO::PARAM_STR);
         $stmt->bindValue(':S',$st->getSurname(),PDO::PARAM_STR);
         $stmt->bindValue(':B',$st->getBirthDate(),PDO::PARAM_STR);
         $stmt->bindValue(':G',$st->getGender(),PDO::PARAM_STR);
         $stmt->bindValue(':H',$st->getHeight(),PDO::PARAM_STR);
         $stmt->bindValue(':W',$st->getWeight(),PDO::PARAM_STR);
         $stmt->bindValue(':P',$st->getPassword(),PDO::PARAM_STR);

         // execute the prepared statement
         try{
            $stmt->execute();
         } catch(Exception $e){
             echo "UserDAO insert : exception recue : ".$e->getMessage()."\xA" ;
         }
     }
  }

  public function delete($obj){
    if($obj instanceof User){
        $dbc = SqliteConnection::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "delete from user where Email = :E";
        $stmt = $dbc->prepare($query);

        // bind the paramaters
        $stmt->bindValue(':E',$obj->getEmail(),PDO::PARAM_STR);
        //$stmt->bindValue(':N',$obj->getName(),PDO::PARAM_STR);
        //$stmt->bindValue(':S',$obj->getSurname(),PDO::PARAM_STR);
        //$stmt->bindValue(':B',$obj->getBirthDate(),PDO::PARAM_STR);
        //$stmt->bindValue(':G',$obj->getGender(),PDO::PARAM_STR);
        //$stmt->bindValue(':H',$obj->getHeight(),PDO::PARAM_STR);
        //$stmt->bindValue(':W',$obj->getWeight(),PDO::PARAM_STR);
        //$stmt->bindValue(':P',$obj->getPassword(),PDO::PARAM_STR);
        
        // execute the prepared statement
        try{
            $stmt->execute();
            unset($obj);
         } catch(Exception $e){
             echo "UserDAO delete : exception recue : ".$e->getMessage()."\xA" ;
         }
    }
    }

  public function update($oldObj, $newObj){
    if($oldObj instanceof User && $newObj instanceof User){
        $dbc = SqliteConnection::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "update user set Email = :newE, Name = :newN, Surname = :newS, BirthDate = :newB, Gender = :newG, Height = :newH, Weight = :newW, Password = :newP where Email = :oldE";
        $stmt = $dbc->prepare($query);

        // bind the paramaters
        $stmt->bindValue(':oldE',$oldObj->getEmail(),PDO::PARAM_STR);

        $stmt->bindValue(':newE',$newObj->getEmail(),PDO::PARAM_STR);
        $stmt->bindValue(':newN',$newObj->getName(),PDO::PARAM_STR);
        $stmt->bindValue(':newS',$newObj->getSurname(),PDO::PARAM_STR);
        $stmt->bindValue(':newB',$newObj->getBirthDate(),PDO::PARAM_STR);
        $stmt->bindValue(':newG',$newObj->getGender(),PDO::PARAM_STR);
        $stmt->bindValue(':newH',$newObj->getHeight(),PDO::PARAM_STR);
        $stmt->bindValue(':newW',$newObj->getWeight(),PDO::PARAM_STR);
        $stmt->bindValue(':newP',$newObj->getPassword(),PDO::PARAM_STR);

        // execute the prepared statement
        try{
            $stmt->execute();
            $oldObj = $newObj;
         } catch(Exception $e){
             echo "UserDAO update : exception recue : ".$e->getMessage()."\xA" ;
         }

    }
}
}
?>
