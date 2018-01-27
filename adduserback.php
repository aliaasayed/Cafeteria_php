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

function check($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
      $firstname = check($_POST["First_name"]);
      $lastname = check($_POST["Last_name"]);
      $address = check($_POST["Address"]);
      $user = check($_POST["User_name"]);
      $Pass = check($_POST["password"]);
      $department = check($_POST["Department"]);  
      $empty_cells = array();
      foreach ($_POST as $key => $value) 
        {
           if (empty($value)) 
              {
                array_push($empty_cells, $key);
              }
        }





?>

</body>
</html>