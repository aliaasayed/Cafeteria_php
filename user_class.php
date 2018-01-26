<?php
include('db.php');

class user
{
  function __construct()
  {

  }

  function getAllUser()
  {
    global $conn;
    $query = "SELECT * FROM user";
    $statement = $conn->prepare($query);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      var_dump($row);
    }
  }
  function getOneUser($email,$password)
  {
    global $conn;
    $query = "SELECT * FROM user where email='$email' and password='$password'";
    $statement = $conn->prepare($query);
    $statement->execute();
    // $rows_count = $statement->rowCount();
    // echo $rows_count;
  }
  function addUser($user_name,$email,$password,$Room_no,$Ext,$Picture)
  {
    global $conn;
    $query = "INSERT INTO user (user_name,email,password,Room_no,Ext,Picture) values('$user_name','$email','$password','$Room_no','$Ext','$Picture')";
    $statement = $conn->prepare($query);
    $statement->execute();
  }

}
$user = new user();
$user->getAllUser();

$user->addUser('aliaa','aliaa@gmail.com','147','2023','2555','');
$user->getOneUser('aliaa@gmail.com','123');

 ?>
