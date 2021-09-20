<?php
 class Activity{
   private $IdActivity;
   private $Date;
   private $Description;
   private $TheUser;
   private $MaxCardio;
   private $MinCardio;
   private $AverageCardio;
   private $BegginingTime;
   private $Duration;

   public function  __construct() { }
   public function init($id , $da ,$de ,$th ,$ma ,$mi ,$av ,$be ,$du){
     $this->IdActivity = $id;
     $this->Date = $da;
     $this->Description = $de;
     $this->TheUser = $th;
     $this->MaxCardio = $ma;
     $this->MinCardio = $mi;
     $this->AverageCardio = $av;
     $this->BegginingTime = $be;
     $this->Duration = $du;
     
   }

   public function getIdActivity(){ return $this->IdActivity; }
   public function getDate(){ return $this->Date; }
   public function getDescription(){ return $this->Description; }
   public function getTheUser(){ return $this->TheUser; }
   public function getMaxCardio(){ return $this->MaxCardio; }
   public function getMinCardio(){ return $this->MinCardio; }
   public function getAverageCardio(){ return $this->AverageCardio; }
   public function getBegginingTime(){ return $this->BegginingTime; }
   public function getDuration(){ return $this->Duration; }

   
   public function  __toString() { return $this->IdActivity. " ". $this->Date." ". $this->Description." ".$this->TheUser." ".$this->MaxCardio." ".$this->MinCardio." ".$this->AverageCardio." ".$this->BegginingTime." ".$this->Duration; }
  }
?>