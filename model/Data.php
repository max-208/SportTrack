<?php
 class Data{
   private $IdData;
   private $Time;
   private $Cardio;
   private $Latitude;
   private $Longitude;
   private $Altitude;
   private $PreviousData;
   private $TheActivity;
  

   public function  __construct() { }
   public function init($id , $ti ,$ca ,$la ,$lo ,$al ,$pr ,$th){
     $this->IdData = $id;
     $this->Time = $ti;
     $this->Cardio = $ca;
     $this->Latitude = $la;
     $this->Longitude = $lo;
     $this->Altitude = $al;
     $this->PreviousData = $pr;
     $this->TheActivity = $th;
    
     
   }

   public function getIdData(){ return $this->IdData; }
   public function getTime(){ return $this->Time; }
   public function getCardio(){ return $this->Cardio; }
   public function getLatitude(){ return $this->Latitude; }
   public function getLongitude(){ return $this->Longitude; }
   public function getAltitude(){ return $this->Altitude; }
   public function getPreviousData(){ return $this->PreviousData; }
   public function getTheActivity(){ return $this->TheActivity; }
   

   
   public function  __toString() { return $this->IdData. " ". $this->Time." ". $this->Cardio." ".$this->Latitude." ".$this->Longitude." ".$this->Altitude." ".$this->PreviousData." ".$this->TheActivity; }
  }
?>
