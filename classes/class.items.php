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


 	public function addItem($item_name,$item_code,$material_cost,$waist,$eqp_hr,$eqp_rate,$margin,$total_amount){

 		$sql = "INSERT INTO ".$this->table."(item_code,item_name,material_cost,waist,eqp_hr,eqp_rate,margin,total_amount)";

 		$sql.=" VALUES (".$item_code.",'".$item_name."',".$material_cost.",".$waist.",".$eqp_hr.",".$eqp_rate.",".$margin.",".$total_amount.")";

        
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
 		

 		$mat = array();

 		while($data=$result->fetch_assoc())
 		{
 			array_push($mat,$data);
 		}
 		
 		return $mat;
 	}

 	public function checkItemExist($item_name)
    {
        $sql = "SELECT count(*) AS count FROM ".$this->table." WHERE item_name='".$item_name."'";

        
        $result = $this->db->query($sql);
        $data=$result->fetch_row();


        return $data[0];
    }

 	/*public function checkItemExist($item_code){

 		 $sql = "SELECT COUNT(*) as count FROM items WHERE item_code=".$item_code;
 		 $result = $this->db->query($sql);
 		 $data=$result->fetch_row();
 		 return $data;
 		 
 	} */

 }
 

?>