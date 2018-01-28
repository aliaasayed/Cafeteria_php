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
include 'user_class.php';

$id_del= $_GET["userid"];
echo($id_del);

$user = new user();
$user->deleteuser($id_del);

/*$return = $produ->showData();*/
 header("Location: allusersback.php");

?>
</body>
</html>