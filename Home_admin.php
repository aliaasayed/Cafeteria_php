<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="css/style.css">
 
</head>
<header>
<?php 
session_start();
$email=$_SESSION['email'];
$password=$_SESSION['password'];
include('navbar_admin.php');?>
</header>
<body>
<div class="container">
	<div class="row">
		<label class="text-primary" id="user_name">Admin </label>
		<img id ="user_photo" src="<?php include('user_class.php'); 
    $user=new user();
    $src=$user->get_Userimage($email); 
    echo $src;

     ?>" class="img-rounded">
	</div>
	<div class="row"  >
		<form method="POST" action="insert_order.php">
		<div class="col-sm-4 well" id="reciept">

        <input id="products_num" type="hidden" name="products_num">    
        <input id="order_amount" type="hidden" name="amount">  
        <p id="label_notes">Notes</p> <textarea rows="5" cols="13" name="Notes"></textarea>
        <br>
        <br>
         Room
        <select id="select_Room" name="Room" class="selectpicker" title="Choose your location" data-width=fit required="">
		 <script type="text/javascript">

	        Options="<?php 
	        foreach($user->getAll_rooms() as $value){
			 extract($value);
	         echo $Room_no;
	         echo '\n';
	        }
        ?>"    	
        </script>
		</select>
        <hr>

        <label id="Total" name="Total"></label>
        <label > EGP</label>
	    <button type="submit" name="submit"  class="btn btn-success">Confirm </button>	
	    
		</div>
        <div col="col-sm-8">
        <center>
         <LABEL>Add to User</LABEL> 
         <select class="selectpicker" title="Choose the User" style="float: right;" name="user_id" id="user_id">
		  <script type="text/javascript">
	        User_name_options="<?php foreach($user->getAll_users() as $value){
			 extract($value);
			 echo $user_ID.",";
	         echo $user_name;
	         echo '\n';
	        }
        ?>"    	
        </script>
		</select>
      
        </div>
        </center>
        <input type="hidden" name="admin" value="1" id="admin">
        </form>
        <hr>
	    <div class="col-sm-8 " >
        <div class="panel panel-default" >   
	    <div class="panel-heading">Products </div>
        <div class="panel-body" id="product_list">   
	    <script type="text/javascript">
        <?php 
        
        include('product_class.php');
        $p = new Product(); 
		?>
		
		 DATA="<?php foreach($p->showData() as $value){
		 extract($value);

         echo $product_ID.",";
		 echo $product_name.",";
		 echo  $price.",";
		 echo  $image;
         echo '\n';
        }
        ?>"
        
        </script>
	     <script type="text/javascript" src="js/Home.js"></script>
        </div>
		</div>
		</div>
    </div>
</div>
</body>
</html>
