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




$target_dir = "product_imgs/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}




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
          $Image = $target_file;
          $produ = new product();
         $produ->update($id_update,$Productname,$Price,$Category,$Image);
         /* $produ->insertData($Productname,$Price,$Category,$Image);*/
          header("Location: allproducts.php");






?>
</body>
</html>
