<?php include('navbar_admin.php');?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
	   <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	   <link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

	<title></title>
</head>

<body>
	<div class="container">
 	 <div class="row">
	<form action="addproductback.php" method="POST" enctype="multipart/form-data">
		<div>
			<header>
				<h1>
					Add Product
				</h1>
			</header>

			<div>
				<label class="col-sm-1 control-label ">Product</label>
				<input type="text" name="ProductName" placeholder="ProductName"
				class="col-sm-4 control-label offset-sm-2" required>
			</div>

			<div>
				<label class="col-sm-1 control-label ">Price</label>
				<input type="number" name="price" placeholder="price" class="col-sm-3 control-label offset-sm-2" required>
			</div>

			<div>
				<label class="col-sm-1 control-label ">Category</label>
				<select class="col-sm-4 control-label offset-sm-2" name="Category">
					<option >Hot Drinks</option>
					<option >Cold Drinks</option>
				</select>
			</div>
			<div>
				<label class="col-sm-1 control-label ">Product Picture</label>
				<input type="file" name="fileToUpload" id="fileToUpload" class="col-sm-6 control-label offset-sm-1">
				<br>
				<br>
			</div>
			<div>
				 <button  type="reset" class="btn btn-primary col-sm-2 offset-sm-0">reset</button>
      			 <button type="submit" name="submit" class="btn btn-primary col-sm-2 offset-sm-2">Save</button>

			</div>

			<div>

				<?php
          // if ($_SERVER["REQUEST_METHOD"] == "GET")
          //     {
          //       $errors_array = explode(":", $_GET["sended"]);
          //       foreach ($errors_array as $current)
          //       {
          //         echo $current."<br>";
          //       }
          //     }
       			 ?>
			</div>



		</div>
		</form>
</div>
</div>


</body>
</html>
