<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">

</script>

<link rel="stylesheet" href="main.css"/>
</head>
<body>

<div  id="main" class="container">
  <h2>login</h2>
  <form class="form-horizontal" action="login.php" method="post">
    <div class="form-group">
<div class="imgcontainer">
      <img src="img_avatar2.png" alt="User_image" class="avatar">
    </div>
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
<?php
echo "<span class=error >".$_GET['E'] ."</span>";

 ?>


<?php
session_start();
$_SESSION['email']=$_POST['email'];
$_SESSION['password']=$_POST['password'];

if($_POST['email']=='admin@admin' && $_POST['password']=='admin')
{
  header("location:orders_admin.php");
}elseif(!empty($_POST['email'])&&!empty($_POST['password'])){
header("location:login_page.php");
}

 ?>
</body>
</html>
