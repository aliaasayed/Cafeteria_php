<?php
$order_id = $_GET[id];

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include('connection.php');

//  echo $id_value;
@$query = "UPDATE orders SET status = 'out-for-delivery' WHERE order_id = $order_id " ;

$stmt = $conn->prepare($query);
$stmt->execute();

$query = "SET GLOBAL event_scheduler = ON";
$stmt = $conn->prepare($query);
$stmt->execute();
 $dataArr0 = array();

$name = uniqid('a');
@$query = "CREATE EVENT $name ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 MINUTE DO UPDATE orders SET status ='done' WHERE order_id = $order_id ";
$stmt = $conn->prepare($query);
$stmt->execute();

echo "<script>window.location.href='orders_admin.php'</script>";



 ?>
