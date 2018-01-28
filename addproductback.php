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



if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {

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
      /*if (empty($empty_cells))
        {

          $Category = $_POST["Category"];
          $Image = "btek";
        	$produ = new product();
          $produ -> insertData($Productname,$Price,$Category,$Image);
         
        */


          $Category = $_POST["Category"];
          $Image = "no image";
          $produ = new product();
          $produ->insertData($Productname,$Price,$Category,$Image);
          header("Location: addproduct.php");



          /*
          }
            else
            {
              $array_to_send = implode(":", $empty_cells);
              header("Location: addproduct.php?sended=$array_to_send");
            }
          */
          
   }


?>

</body>

</html>



