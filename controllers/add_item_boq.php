<?php
 error_reporting(E_ALL);
 ini_set('display_errors', '1');

 
  include_once "../classes/class.items.php";
  include_once "../classes/class.boq.php"; 
 
  
  $boq= new BOQItems();
 $item_code = $_POST['item_code'];

 $quantity     = $_POST['quantity'];

 $boq_code     = $_POST['boq_code'];

 

 

 
 if($boq->checkItemExist($item_code,$boq_code)!=0)
 {
 	header('Content-Type: application/json');
   echo json_encode(array('code'=>0,'msg'=>'Item already added'));
 }


 else if($data=$boq->additems($item_code,$boq_code,$quantity))
 {
   
   $itemcost=$boq->getItemCost($boq_code);
   header('Content-Type: application/json');
   echo json_encode(array('code'=>1,'result'=>$data,'mat_cost'=>$itemcost));
 }
 