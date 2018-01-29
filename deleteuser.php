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
session_start();

if((!isset($_SESSION['email']))&& (!isset($_SESSION['password'])))
{
		echo "<script>window.location.href='index.php'</script>";
}
$id_del= $_GET["userid"];
echo($id_del);

$user = new user();
$user->deleteuser($id_del);

/*$return = $produ->showData();*/
echo "<script>window.location.href='allusersback.php'</script>";


?>
</body>
</html>
