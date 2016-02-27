<?php
 error_reporting(E_ALL);
 ini_set('display_errors', '1');

 include_once "../classes/class.itemMaterials.php";
  include_once "../classes/class.items.php";
  include_once "../classes/class.itemCode.php";

$Mat = new ItemMaterials();
 $item_code = $_POST['item_code'];

 $item_name     = $_POST['item_name'];

 $material_cost = $materialcost=$Mat->materialCost($item_code)[0];


 $waist         = $_POST['waist'];



 $waist_cost  = $material_cost * ($waist/100);

 $eqp_hours       = $_POST['eqp_hours'];

 $eqp_rate     = $_POST['eqp_rate'];

 $other_cost   = $_POST['other_cost'];

 $margin       = $_POST['margin'];

 $margin_cost   = $margin/100*$material_cost;

 $eqp_amount = $eqp_rate*$eqp_hours;

 $total_amount    = $material_cost + $waist_cost+$eqp_amount + $material_cost;

 $it = new Item();
 $ic = new itemCode();

 
 if($it->checkItemExist($item_name)!=0)
 {
 	header('Content-Type: application/json');
   echo json_encode(array('code'=>0,'msg'=>'Item already exists'));
 }
 else if(!$material_cost)
 {
 	header('Content-Type: application/json');
   echo json_encode(array('code'=>0,'msg'=>'Please add Materials '));
 }

 else if($it->addItem($item_name,$item_code,$material_cost,$waist,$eqp_hours,$eqp_rate,$margin,$total_amount))
 {
   

   $ic->submitItemCode($item_code);
   header('Content-Type: application/json');
   echo json_encode(array('code'=>1));
 }
 