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

$target_dir = "user_imgs/";
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



if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
      $name = check($_POST["username"]);

      $email = check($_POST["email"]);
      $Room_no = check($_POST["Room_no"]);
      $Pass = check($_POST["password"]);
      $encrypted_pass = md5($Pass);

      $confpassword = check($_POST["confpassword"]);
      $encrypted_conf = md5($confpassword);

      $Ext = check($_POST["Ext"]);

      $empty_cells = array();
      foreach ($_POST as $key => $value)
        {
           if (empty($value))
              {
                array_push($empty_cells, $key);
              }
        }

$Picture=$target_file;
echo $Picture;
if ($encrypted_conf==$encrypted_pass)
{
   $user = new user();
        $user->addUser($name,$email,$encrypted_pass,$Room_no,$Ext,$Picture);
				echo "<script>window.location.href='adduser.php'</script>";
}

  elseif ($encrypted_conf!=$encrypted_pass)
  {
    $pass_error= "password doesn't match the confirmation";
		echo "<script>window.location.href='adduser.php?sended=$pass_error'</script>";
  }





}



?>

</body>
</html>
