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

function check($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




      $Productname = check($_POST["ProductName"]);
      $Price = check($_POST["price"]);
       
      $empty_cells = array();
      foreach ($_POST as $key => $value) 
        {
           if (empty($value)) 
              {
                array_push($empty_cells, $key);
              }
        }

        $id_update = $_GET["productid"];



 		  $Category = $_POST["Category"];
          $Image = "no image";
          $produ = new product();
         $produ->update($id_update,$Productname,$Price,$Category,$Image);
         /* $produ->insertData($Productname,$Price,$Category,$Image);*/
          header("Location: updateproduct.php");






?>
</body>
</html>