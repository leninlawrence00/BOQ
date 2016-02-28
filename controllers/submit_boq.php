<?php
 error_reporting(E_ALL);
 ini_set('display_errors', '1');

 
  include_once "../classes/class.boqCode.php";

 $bc = new BOQCode();
 

 $boq_code     = $_POST['boq_code'];

 
 
 if($bc->submitBoqCode($boq_code))
 {
   

   
   header('Content-Type: application/json');
   echo json_encode(array('code'=>1));
 }
 else
 {
 	header('Content-Type: application/json');
   echo json_encode(array('code'=>0));
 }
 