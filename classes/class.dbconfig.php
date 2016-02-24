<?php
 
 class DB{

 	  private $server = "localhost";

 	  private $username = "root";

 	  private $password = "";

 	  private $db      = "boq";

 	  private $conn    = "";

 	  public function connectDB(){

 	  	$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);

 	  	return $this->conn;
 	  }
 }

?>