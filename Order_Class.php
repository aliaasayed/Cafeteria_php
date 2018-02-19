<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include('connection.php');

class Order{


  function __construct(){


  }
  public function delete_order($id)
{
  global $conn;
  $query="DELETE FROM orders WHERE order_id='$id'";

  $result=$conn->prepare($query);
  $result->execute();

}

  public function get_all_orders()
  {
    global $conn;
    $query='SELECT * FROM orders';

    $result=$conn->prepare($query);

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
     $data[]=$row;

     }
     return $data;


  }


  public function insert_order($user_id,$amount,$order_room,$notes)
  {
    global $conn;
    $date=date("Y-m-d");
    $time=date("h:i:s");

    $query="INSERT INTO orders(user_id,date,time,amount,notes,order_room) values ('$user_id','$date','$time','$amount','$notes','$order_room') ";

    $result=$conn->prepare($query);
    $result->execute();


  }

  public function get_latest_order_id($user_id)
  {
     global $conn;

     $query="Select MAX(order_id) AS max_val from orders where user_id='$user_id'";
     $result=$conn->prepare($query);
    $result->execute();
    $max_row = $result->fetch(PDO::FETCH_ASSOC);
    $max=$max_row['max_val'];
    return $max;

  }

  public function get_processing_orders()
  {
     global $conn;

     $query="Select date,time,amount from orders where status='processing'";
     $result=$conn->prepare($query);
     $result->execute();
     $max_row = $result->fetch(PDO::FETCH_ASSOC);
     $max=$max_row['max_val'];
     return $max;

  }
}


?>
