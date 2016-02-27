<?php
 
 include_once "class.dbconfig.php";

 class ItemMaterials{


 	private $material_name;

 	private $quantity;

 	private $unit;

 	private $rate;

 	private $amount;

 	private $item_id;

 	private $db;

 	private $table = 'materials';

 	function __construct(){

 		$conn = new DB();

 		$this->db= $conn->connectDB();


 	}

 	function addMaterials($material_name,$quantity,$unit,$rate,$amount,$item_id){

 		$sql = "INSERT INTO ".$this->table." (materials_name,quantity,unit,rate,amount,item_id) VALUES ('".$material_name."',".$quantity.",'".$unit."',".$rate.",".$amount.",".$item_id.")";

 		
 		if($this->db->query($sql)){
 			$last_id = $this->db->insert_id;
 			 $where = array('id'=>$last_id);
 			return $this->getMaterials(null,$where);
 		}
 		else{
 			return 0;
 		}

 	}

 	function getMaterials($col,$where){

 		$colnames = "";
 		if($col)
 		{
 			for($i=0;$i<count($col);$i++)
 			{
 				($i==count($col)-1)? $colnames.=$col[$i] : $colnames.=$col[$i].",";
 				

 			}
 		}
 		else
 			$colnames="*";

 		$sql = "SELECT ".$colnames." FROM ".$this->table;
 		if($where)
 		{
 			//$sql.=" WHERE id=".$id;
 			$wherekeys = array_keys($where);
 			for($j=0;$j<count($wherekeys);$j++)
 			{
 				$key=$wherekeys[$j];
 				($j==count($wherekeys)-1)? $sql.=" WHERE ".$key."=".$where[$key] : $sql.=" WHERE ".$key."=".$where[$key]." AND";

 			}
 		}

 		
 		$result = $this->db->query($sql);

 		$mat = array();

 		while($data=$result->fetch_assoc())
 		{
 			array_push($mat,$data);
 		}
 		
 		return $mat;
 	}

 	function materialCost($item_id){
 		$sql= "SELECT SUM(amount) as material_cost FROM ".$this->table." WHERE item_id=".$item_id;
 		$result = $this->db->query($sql);
 		$data=$result->fetch_row();
 		//return $data['material_cost'];
 		return $data;

 	}

 	function getMaterialsForItem($item_code)
 	{
 		$where = array('item_id'=>$item_code);
 		return $this->getMaterials(null,$where);
 	}

 	
 }

?>