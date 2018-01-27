<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include('connection.php');

class Order_Product{

  
  function __construct(){


  }
//Select order products by id
  public function select_order_products($order_id)
  {
    global $conn;

    $query="SELECT product_id,Quantity,notes from order_product where order_id='$order_id'";

    $result=$conn->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
     $data[]=$row;

     }
     return $data;
   
  } 

  public function insert_order_product($order_id,$product_id,$quantity,$notes)
  {
    global $conn;

    $query="INSERT INTO order_product(order_id,product_id,Quantity,notes) values ('$order_id','$product_id','$quantity','$notes') ";

    $result=$conn->prepare($query);
    $result->execute();


  } 

  //////get_latest_order_product
}  

$order_1=new Order_Product();
$result=$order_1->insert_order_product(1,1,5,"1 tea extra sugar");


?>