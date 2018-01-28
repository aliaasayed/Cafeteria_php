<!DOCTYPE html>
<html>
<head>
	 <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
        </script>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style type="text/css">
	#product_img{
		width: 70px;
		height: 70px;
	}
</style>

</head>
<body>
	<div>
			<header>All Products 
			<a href="addproduct.html"> Add product</a>
			</header>
			<div>
				<table class="table table-striped table-dark" id="tablebody">
					<thead>
						<tr>
							<th> Product</th>
							<th> Price</th>
							<th> image</th>
							<th> Availability</th>
							<th> Action</th>
						</tr>
					</thead>
					
					


				</table>
			</div>
	</div>
	

<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'connection.php';
include 'product_class.php';

$produ = new product();
$return = array();
$return = $produ->showData();
json_encode($return);
// $i=0;
// for($i=0; $i<sizeof($return); $i++)
// {
// 	print_r($return[$i]);
// }



?>

<script type="text/javascript">
	var product = document.getElementById('tablebody');
	var myarr = <?php echo json_encode($return); ?>
	//console.log(Object.keys(myarr).length)
if (!Object.keys) 
{
    Object.keys = function (obj) 
    {
        var arr = [],
            key;
        for (key in obj) 
        {
            if (obj.hasOwnProperty(key)) 
            {
                arr.push(key);
            }
        }
        return arr;
    };
}
console.log(Object.keys(myarr).length)
for(let i=0; i<Object.keys(myarr).length; i++)
	{
			var product = document.getElementById('tablebody');
			product.innerHTML += '<tr id="row'+myarr[i]["product_ID"]+'"><td id="Product">'+myarr[i]["product_name"]+'</td><td id="Price">'+myarr[i]["price"]+'</td><td id="image"><img id="product_img" src="'+myarr[i]["image"]+'"></td><td id="status'+myarr[i]+'"><input type="button" class="status" name="productstatus" id="status'+myarr[i]["product_ID"]+'" value="'+myarr[i]["status"]+'"></td><td id="action"><input type="button" class="delete" name="deleteproduct" value="Delete" id="'+myarr[i]["product_ID"]+'"><input type="button" class="update" name="updateproduct" id="update'+myarr[i]["product_ID"]+'" value="update"></td></tr>'
			
			
}

for(let i=0; i<Object.keys(myarr).length; i++)
{
	document.getElementById(myarr[i]["product_ID"]).addEventListener("click",function(e){
				e.preventDefault()
				document.getElementById("row"+e.target.id).outerHTML = ""
				window.location.href='deleteproduct.php?productid='+myarr[i]["product_ID"];
				

})
}

for(let i=0; i<Object.keys(myarr).length; i++)
{
	document.getElementById("update"+myarr[i]["product_ID"]).addEventListener("click",function(e){
				e.preventDefault()
				
				
				window.location.href='updateproduct.php?productid='+myarr[i]["product_ID"];
				

				
				})
}

for(let i=0; i<Object.keys(myarr).length; i++)
{
	document.getElementById("status"+myarr[i]["product_ID"]).addEventListener("click",function(e){
				e.preventDefault()
				
				if(e.target.value=="available")
				{
					e.target.value = "unavailable"
					var new_status = e.target.value
				}

				else
				{
					e.target.value = "available"
					var new_status = e.target.value
				}

				console.log(new_status)
				

				window.location.href='productstatus.php?productid='+myarr[i]["product_ID"]+'&status='+new_status;				

				
				})
}

</script>


</body>
</html>






