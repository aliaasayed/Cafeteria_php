<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();

if((!isset($_SESSION['email']))&& (!isset($_SESSION['password'])))
{
		echo "<script>window.location.href='index.php'</script>";
}

ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'connection.php';
include 'product_class.php';

$product = new product();
$status = $_GET["status"];
$id = $_GET["productid"];

$product->update_status($id,$status);
echo "<script>window.location.href='allproducts.php'</script>";
?>

</body>
</html>
