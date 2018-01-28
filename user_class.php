<?php
include('connection.php');

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

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
      $data[]=$row;
    }
    return $data;
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


  public function deleteuser($user_ID){
          global $conn;
        $query="DELETE FROM user WHERE user_ID='$user_ID' ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return true;
        }


      public function update($user_ID,$user_name,$email,$password,$Room_no,$Ext,$Picture){
         global  $conn;
          $query = "UPDATE product
           SET user_name ='$user_name' ,email ='$email',password='$password',Room_no='$Room_no' , Ext='$Ext', Picture='$Picture'
           WHERE user_ID ='$user_ID' ";
           $stmt = $conn->prepare($query);
           $stmt->execute();
           return true;
          }

}


 ?>
