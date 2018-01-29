<!DOCTYPE html>
<html>
<head>
	<title>

	</title>
</head>
<body>
	<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'connection.php';
include 'product_class.php';
session_start();

if((!isset($_SESSION['email']))&& (!isset($_SESSION['password'])))
{
		echo "<script>window.location.href='index.php'</script>";
}
$id_del= $_GET["productid"];
echo($id_del);

$produ = new product();
$produ->deleteData($id_del);
/*$return = $produ->showData();*/
echo "<script>window.location.href='allproducts.php'</script>";

?>
</body>
</html>
