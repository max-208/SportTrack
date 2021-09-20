<?php
class User{
    private $Email;
    private $Name;
    private $Surname;
    private $BirthDate;
    private $Gender;
    private $Height;
    private $Weight;
    private $Password;

    public function  __construct() {}
    public function init($E, $N, $S, $B, $G, $H, $W, $P){
        $this->Email = $E;
        $this->Name = $N;
        $this->Surname = $S;
        $this->BirthDate = $B;
        $this->Gender = $G;
        $this->Height = $H;
        $this->Weight = $W;
        $this->Password = $P;
    }

    public function getEmail(){ return $this->Email; }
    public function getName(){ return $this->Name; }
    public function getSurname(){ return $this->Surname; }
    public function getBirthDate(){ return $this->BirthDate; }
    public function getGender(){ return $this->Gender; }
    public function getHeight(){ return $this->Height; }
    public function getWeight(){ return $this->Weight; }
    public function getPassword(){ return $this->Password; }

    public function  __toString() { return $this->Email. " ". $this->Name. " ".$this->Surname. " ".$this->BirthDate. " ".$this->Gender. " ".$this->Height. " ".$this->Weight. " ".$this->Password; }
}
?>
