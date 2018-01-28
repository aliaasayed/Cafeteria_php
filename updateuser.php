<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update User</title>

 

   <meta charset="utf-8">
  <!--  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
<div class="container">
  <div class="row">
<form action="updateuserback.php?userid=<?php echo($_GET["userid"])?>" method="POST">
  <h1> Update User </h1>
         
    <label class="col-sm-1 control-label " >Name</label>
    <input type="text" placeholder="Username" name="username" class="col-sm-3 control-label offset-sm-2" for="formGroupInputLarge" required ><br><br>

  <label class="col-sm-1 control-label" >Email</label>
  <input type="Email" placeholder="email" name="email" class="col-sm-3 control-label offset-sm-2" for="formGroupInputLarge" required><br><br>

  <label class="col-sm-1 control-label" >Password</label>
  <input type="password" placeholder="password" name="password" class="col-sm-3 control-label offset-sm-2" for="formGroupInputLarge" required><br><br>

  <label class="col-sm-1 control-label" >Confirm Password</label>
  <input type="password" placeholder=" Confirm password" name="confpassword" class="col-sm-5 control-label offset-sm-2" for="formGroupInputLarge" required><br><br>

  <label class="col-sm-1 control-label" >Room no</label>
  <input type="number" placeholder="Room no" name="Room_no" class="col-sm-4 control-label offset-sm-2" for="formGroupInputLarge" required ><br><br>


  <label class="col-sm-1 control-label" >Ext.</label>
  <input type="number" placeholder="Ext." name="Ext" class="col-sm-2 control-label offset-sm-2" for="formGroupInputLarge" required ><br><br>

  <label class="col-sm-1 control-label " >Profile Picture</label>
  <input type="file" class="offset-sm-1" ><br><br>
  
    <!--  --><div class="form-group row">
   <!-- <div class="col-sm-10 offset-sm-2"> --> 

      <button  type="reset" class="btn btn-primary col-sm-2 offset-sm-1">reset</button>
      <button type="submit" class="btn btn-primary col-sm-2 offset-sm-3">Save</button>
  
    </div>

<div>
  <?php
          if ($_SERVER["REQUEST_METHOD"] == "GET") 
              {

                $errors = $_GET["sended"];
                  echo $errors."<br>";
                
              } 
        ?>

</div>
  
</form>

</div>
</div>



</body>
</html>