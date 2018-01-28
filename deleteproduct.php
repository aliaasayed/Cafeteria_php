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

$id_del= $_GET["productid"];
echo($id_del);

$produ = new product();
$produ->deleteData($id_del);
/*$return = $produ->showData();*/
 header("Location: allproducts.php");

?>
</body>
</html>
