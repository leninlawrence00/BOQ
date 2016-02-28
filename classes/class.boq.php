<?php

include_once "class.dbconfig.php";
class BOQItems{

	private $boq_code;

	private $item_code;

	private $db;

	private $table = "boq_items";

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
    function addItems($item_code,$boq_code,$quantity){

 		$sql = "INSERT INTO ".$this->table." (item_code,boq_code,quantity) VALUES (".$item_code.",".$boq_code.",".$quantity.")";

 		
 		
 		if($this->db->query($sql)){
 			$last_id = $this->db->insert_id;
 			 
 			return $this->getItems($last_id);
 		}
 		else{
 			return 0;
 		}

 	}



 	function materialCost($item_id){
 		$sql= "SELECT SUM(amount) as material_cost FROM ".$this->table." WHERE item_id=".$item_id;
 		$result = $this->db->query($sql);
 		$data=$result->fetch_row();
 		//return $data['material_cost'];
 		return $data;

 	}

 	function getItemsForBoq($boq_code)
 	{
 		$sql ="SELECT * FROM boq_items LEFT JOIN items ON boq_items.item_code = items.item_code WHERE boq_items.boq_code=".$boq_code;
 		
 		
 		$result = $this->db->query($sql);

 		$it = array();

 		while($data=$result->fetch_assoc())
 		{
 			array_push($it,$data);
 		}
 		
 		return $it;
 	}

 	function getItems($id)
 	{
 		$sql ="SELECT * FROM boq_items LEFT JOIN items ON boq_items.item_code = items.item_code WHERE boq_items.id=".$id;
 		
 		$result = $this->db->query($sql);

 		$it = array();

 		while($data=$result->fetch_assoc())
 		{
 			array_push($it,$data);
 		}
 		
 		return $it[0];
 	}

 	function checkItemExist($item_code,$boq_code)
 	{
 		 $sql = "SELECT count(*) AS count FROM ".$this->table." WHERE item_code=".$item_code." AND boq_code=".$boq_code;

        
        $result = $this->db->query($sql);
        $data=$result->fetch_row();


        return $data[0];
 	}

 	function getItemCost($boq_code)
 	{
 		$sql = "SELECT boq_items.item_code as item_code,boq_items.quantity as quantity,items.total_amount as total_amount FROM items LEFT JOIN boq_items ON items.item_code = boq_items.item_code WHERE boq_items.boq_code=".$boq_code;

 		$result = $this->db->query($sql);
 		$amount =0;
 		while($data= $result->fetch_assoc()){
 			$amount+= $data['total_amount']*$data['quantity'];
 		}
 		return $amount;
 	}
}

?>