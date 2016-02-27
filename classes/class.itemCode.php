<?php
include_once "class.dbconfig.php";

class itemCode{

	private $item_code;

	private $status;

	private $db;

	private $table = "item_codes";

    public function __construct(){

    	$conn = new DB();

    	$this->db = $conn->connectDB();
    }

    public function generateItemCode(){
    	$sql = "SELECT item_code FROM ".$this->table." ORDER BY item_code DESC LIMIT 1";
    	

    	$result = $this->db->query($sql);
 		$data=$result->fetch_row();

 		return $data[0];
 		
    }

    public function submitItemCode($item_code)
    {
        $sql = "INSERT INTO ".$this->table. " (item_code) VALUES (".$item_code.")";
        if($this->db->query($sql)){
            
            return 1;
        }
        else{
            return 0;
        } 
    }

}

?>