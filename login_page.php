<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

echo"login successfully";

session_start();
$email=$_SESSION['email'];
$password=$_SESSION['password'];

echo $email;
include('connection.php');
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $databasename, $serverpassword);
$stmt = $conn->prepare("SELECT email , password ,user_ID FROM user WHERE email = '$email' and password='$password'");
$stmt->execute();
while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $_SESSION['user_ID']=$user['user_ID'];
}
if($stmt->rowCount() > 0) {
  echo "<script>window.location.href='Home_user.php'</script>";
  echo"not done";
} else {
  echo "<script>window.location.href='index.php'</script>";
echo"done";
}


 ?>
