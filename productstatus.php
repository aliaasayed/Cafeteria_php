<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'connection.php';
include 'product_class.php';

$product = new product();
$status = $_GET["status"];
$id = $_GET["productid"];

$product->update_status($id,$status);

 header("Location: allproducts.php");

?>

</body>
</html>