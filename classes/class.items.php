<?php
 
 include_once "class.items.php";

 class Item{
 	private $item_name;

 	private $item_code;

 	private $material_cost;

 	private $waist;

 	private $labour_cost;

 	private $eqp;

 	private $other_cost;

 	private $total_cost;

 	private $margin;

 	private $total_amount;

 	private $db;

 	private $table = "items";

 	public function __construct(){

 		$conn = new DB();

 		$this->db= $conn->connectDB();
 	}


 	public function addItem($item_name,$item_code,$material_cost,$waist,$labour_cost,$eqp,$other_cost,$total_cost,$margin,$total_amount){

 		$sql = "INSERT INTO ".$this->table."(item_code,item_name,material_cost,waist,labour_cost,eqp,other_cost,total_cost,margin,total_amount)";

 		$sql.=" VALUES (".$item_code.",'".$item_name."',".$material_cost.",".$waist.",".$labour_cost.",".$eqp.",".$other_cost.",".$total_cost.",".$margin.",".$total_amount.")";

 		if($this->db->query($sql)){
 			
 			return 1;
 		}
 		else{
 			return 0;
 		}
 	}

 	public function getItems(){

 		$sql = "SELECT * FROM items";
 		$result = $this->db->query($sql);
 		$data=$result->fetch_assoc();
 		if($data)
 		 return $data; 
 		else
 		 return 0;
 	}


 }
 

?>