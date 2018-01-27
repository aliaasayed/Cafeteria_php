<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include('connection.php');

class Order{

  
  function __construct(){


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
  

  public function insert_order($user_id,$amount,$order_room)
  {
    global $conn;
    $date=date("Y-m-d");
    $time=date("h:i:s");
    echo $time;
    echo $date;
    $query="INSERT INTO orders(user_id,date,time,amount,order_room) values ('$user_id','$date','$time','$amount','$order_room') ";

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

$order_1=new Order();
//$result=$order_1->insert_order(1,500,2013);
$result=$order_1->get_latest_order_id(1);
echo $result;

/*foreach($p->showData() as $value){
 extract($value);


echo "<br> no:".$product_ID;
echo "<br> name:".$product_name;
echo "<br> price:".$price;
echo "<br> category:".$category;

}
*/

?>
