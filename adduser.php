<?php include('navbar_admin.php');
session_start();

if((!isset($_SESSION['email']))&& (!isset($_SESSION['password'])))
{
		echo "<script>window.location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add User</title>


  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

   <meta charset="utf-8">
  <!--  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
<div class="container">
<form action="adduserback.php" method="POST" enctype="multipart/form-data">
  <h1> Add User </h1>
  <hr>
    <div class="row">
      <label class="col-sm-2 control-label " >Name</label>
      <input type="text" placeholder="Username" name="username" class="col-sm-3 control-label " for="formGroupInputLarge" required >
    </div>

    <br>

    <div class="row">
      <label class="col-sm-2 control-label" >Email</label>
      <input type="Email" placeholder="email" name="email" class="col-sm-3 control-label" for="formGroupInputLarge" required>
    </div>

    <br>

   <div class="row">
      <label class="col-sm-2 control-label" >Password</label>
      <input type="password" placeholder="password" name="password" class="col-sm-3 control-label" for="formGroupInputLarge" required>

    </div>

    <br>

    <div class="row">
      <label class="col-sm-2 control-label" >Confirm Password</label>
      <input type="password" placeholder=" Confirm password" name="confpassword" class="col-sm-3 control-label" for="formGroupInputLarge" required>

    </div>

    <br>

    <div class="row">
      <label class="col-sm-2 control-label" >Room no</label>
      <input type="number" placeholder="   Room no" name="Room_no" class="col-sm-2 control-label" for="formGroupInputLarge" required ><br><br>
    </div>

     <br>

    <div class="row">
      <label class="col-sm-2 control-label" >Ext.</label>
      <input type="number" placeholder="   Ext." name="Ext" class="col-sm-2 control-label" for="formGroupInputLarge" required >
    </div>

     <br>
   <div class="row">
    <label class="col-sm-2 control-label " >Profile Picture</label>
    <input type="file" name="fileToUpload" id="fileToUpload" class="offset-sm-1" ><br><br>
  </div>

    <br>
    <div class="form-group row">
   <!-- <div class="col-sm-10 offset-sm-2"> -->
      <button  type="reset" class="btn btn-success col-sm-2 ">reset</button>
      <button type="submit" name="submit" class="btn btn-success col-sm-2 ">Save</button>

    </div>

<div>
  <?php
          if ($_SERVER["REQUEST_METHOD"] == "GET")
              {

                @$errors = $_GET["sended"];
                  echo $errors."<br>";

              }
        ?>


</form>

</div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

</body>
</html>
