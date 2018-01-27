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
<?php include('navbar_admin.php');?>
</header>
<body>
<div class="container">
	<div class="row">
		<label class="text-primary" id="user_name">Admin </label>
		<img id ="user_photo" src="img/cola_2.png" class="img-rounded">
	</div>
	<div class="row"  >
		<form method="POST" >
		<div class="col-sm-4 well" id="reciept">

        <p id="label_notes">Notes</p> <textarea rows="5" cols="13" name="Notes"></textarea>
        <br>
        <br>
         Room
        <select class="selectpicker" title="Choose your location" data-width=fit>
		  <option>2023</option>
		  <option>2012</option>
		  <option>1012</option>
		</select>
        <hr>

        <label name="Total" style="display: block;">Total</label>
	    <button type="submit" name="submit"  class="btn btn-success">Confirm </button>	
	    </form>



		</div>	
        <div col="col-sm-8">
        <center>
         <LABEL>Add to User</LABEL> 
         <select class="selectpicker" title="Choose the User" style="float: right;">
		  <option>Sarah</option>
		  <option>Hesham</option>
		</select>
        </div>
        </center>
        <hr>
	    <div class="col-sm-8 " >
        <div class="panel panel-default" >   
	    <div class="panel-heading">Products </div>
        <div class="panel-body" id="product_list">   
	    <script type="text/javascript">
        <?php 
        
        include('product_class.php');
        $p = new product(); 
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
