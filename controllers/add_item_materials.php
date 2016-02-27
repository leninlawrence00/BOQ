<?php
 error_reporting(E_ALL);
 ini_set('display_errors', '1');

 include_once "../classes/class.itemMaterials.php";
  include_once "../classes/class.items.php";

 $material_name = $_POST['material_name'];

 $quantity     = $_POST['quantity'];

 $unit         = $_POST['unit'];

 $rate         = $_POST['rate'];

 $amount       = $_POST['amount'];

 $item_code     = $_POST['item_code'];

 $it = new Item();

 
 $Mat = new ItemMaterials();

 if($data=$Mat->addMaterials($material_name,$quantity,$unit,$rate,$amount,$item_code))
 {
   
   $materialcost=$Mat->materialCost($item_code);
   header('Content-Type: application/json');
   echo json_encode(array('code'=>1,'result'=>$data,'mat_cost'=>$materialcost));
 }
 






?>