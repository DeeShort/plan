<?php
session_start();
// Klasse für den Datenbankzugriff  ( model  vom MVC)
class dabclass
{ // Klassenvariablen / Attribute / members
  // als private definieren, da von aussen nicht ereichbar sein sollen ( Kapselung)
  private $server;
  private $user;
  private $passwort;
  private $dbname;
  private $pdo;    // Verbindungsvariable
  // Konstruktor mit 2x Unterstrich und Namen construct()
  public function __construct()   // muss public sein 
  {
    $doc =  parse_ini_file("settings.ini");
    $this->server   = $doc["server"];
    $this->user     = $doc["user"];
    $this->passwort = $doc["passwort"];
    $this->dbname   = $doc["datenbank"];  
	// $this ist ein Zeiger auf sich selbst somit auch Zugriff auf 
    // die Klassenvariablen	
	$this->pdo = new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->user,$this->passwort);
	$this->pdo->exec("set names utf8");
  }
  
  public function showplan(){
      $sql="select * from main";
      $input=$this->pdo->query($sql);
      return $input->fetchAll();        
  }
  
  public function deleteplan($planid){
      $sql="delete from main where id = ".$planid;
      $ergebnis=$this->pdo->query($sql);
  }
  
  public function newplan($wurst) {
      $sql="insert into main(Verbal,DLine,Plus,Minus,Status) values(?,?,?,?,?)";
      $ergebnis= $this->pdo->prepare($sql);
      $ergebnis->execute(array($wurst["verbal"],$wurst["dline"],$wurst["plus"],$wurst["minus"],$wurst["status"]));
     }
  
  public function editplan($wurst) {
      $sql="update main set Verbal=?,DLine=?,Plus=?,Minus=?,Status=? where id =?";
      $ergebnis=$this->pdo->prepare($sql);
      $ergebnis->execute(array($wurst["verbal"],$wurst["dline"],$wurst["plus"],$wurst["minus"],$wurst["status"],$wurst["planid"]));
      
  }
  
  public function getplan($pid) {
      $sql="select * from main where id=".$pid;
      $ergebnis=$this->pdo->query($sql);     
      $output=$ergebnis->fetch();
      return $output;
      
  }
}
  