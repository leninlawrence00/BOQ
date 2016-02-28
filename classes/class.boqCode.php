<?php
include_once "class.dbconfig.php";

class BOQCode{

	private $boq_code;

	private $db;

	private $table = "boq_code";

    public function __construct(){

    	$conn = new DB();

    	$this->db = $conn->connectDB();
    }

     public function generateBoqCode(){
    	$sql = "SELECT boq_code FROM ".$this->table." ORDER BY boq_code DESC LIMIT 1";
    	

    	$result = $this->db->query($sql);
 		$data=$result->fetch_row();

 		return $data[0];
 		
    }

     public function submitBoqCode($boq_code)
    {
        $sql = "INSERT INTO ".$this->table. " (boq_code) VALUES (".$boq_code.")";
        if($this->db->query($sql)){
            
            return 1;
        }
        else{
            return 0;
        } 
    }
}

?>