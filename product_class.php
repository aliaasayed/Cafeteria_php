<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include('connection.php');

class Product {

  function __construct()
  {

  }

     public function showData(){
       global  $conn;
     $query='SELECT * FROM product ';
     $stmt = $conn->query($query) or die("failed!");
     while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     $data[]=$row;

     }
     return $data;
     }

     public function getById($id){
       global  $conn;
     $query="SELECT * FROM product WHERE product_ID ='$id'";
     $stmt = $conn->prepare($query);
     $stmt->execute();
     $data = $stmt->fetch(PDO::FETCH_ASSOC);
     return $data;
     echo $product_ID;
     }


}

//how to use function

$p = new product(); //create object of class
// loop for all column in table
foreach($p->showData() as $value){
 extract($value);


echo "<br> no:".$product_ID;
echo "<br> name:".$product_name;
echo "<br> price:".$price;
echo "<br> category:".$category;

}

 ?>
