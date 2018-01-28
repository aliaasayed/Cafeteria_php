<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



	<title></title>
</head>

<body>
	<div class="container">
 	 <div class="row">
	<form action="updateproductback.php" method="POST">
		<div>
			<header>
				<h1>
					Update Product
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
				<select class="col-sm-3 control-label offset-sm-2" name="Category">
					<option >Hot Drinks</option>
					<option >Cold Drinks</option>
				</select>
				<a href="">Add Category</a>
			</div>
			<div>
				<label class="col-sm-1 control-label ">Product Picture</label>
				<input type="file" name="ProductPicture" class="col-sm-3 control-label offset-sm-1" name="Image" >
				<br>
				<br>
			</div>
			<div>
				 <button  type="reset" class="btn btn-primary col-sm-2 offset-sm-0">reset</button>
      			 <button type="submit" class="btn btn-primary col-sm-2 offset-sm-2">Save</button>
  				 
			</div>
			<div>
				
			<?php 

						




			 ?>

			
			 </div>
		</div>
		</form>
</div>
</div>


</body>
</html>