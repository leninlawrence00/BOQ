<?php
 error_reporting(E_ALL);
 ini_set('display_errors', '1');

 include_once "../classes/class.itemMaterials.php";

 $material_name = $_POST['material_name'];

 $quantity     = $_POST['quantity'];

 $unit         = $_POST['unit'];

 $rate         = $_POST['rate'];

 $amount       = $_POST['amount'];

 $item_id     = $_POST['item_id'];

 $Mat = new ItemMaterials();

 if($data=$Mat->addMaterials($material_name,$quantity,$unit,$rate,$amount,$item_id))
 {
 	 header('Content-Type: application/json');
   echo json_encode(array('code'=>1,'data'=>$data));
 }
 






?>