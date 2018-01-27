<!DOCTYPE html>
<html>
<head>
	 <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
        </script>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
for(i=0; i<Object.keys(myarr).length; i++)
	{
			var product = document.getElementById('tablebody');
			product.innerHTML += '<tr><td id="Product">'+myarr[i]["product_name"]+'</td><td id="Price">'+myarr[i]["price"]+'</td><td id="image">'+myarr[i]["image"]+'</td><td id="status">'+myarr[i]["status"]+'</td><td id="action"><input type="button" class"delete" name"deleteproduct" value"Delete"><input type="button" class"update" name"updateproduct" value"update"></tr>'




var delete_button = document.getElementByClassName('delete')
delete_button.addEventListener("click", function(e)
{
	e.preventDefault()

})



















/*<input type="button" class="delete" name="'+choose_file.value+'" id="del'+play_list.length+'" value="Delete">*/



	}

//Object.keys(obj).length;


	

/*	function convert(original) 
		{
		    var multiArray = [];
			    for(var key in original) 
			    	{ 
			    		multiArray.push([ key, original[key] ])
			    	}
		    return multiArray;
		}
	var multi = convert(myarr)
	console.log(multi)
*/

</script>


</body>
</html>

<!-- <?php
/*foreach ($return as $key => $value)
{
	echo "<script type=\"text/javascript\">
		 product.innerHTML +='<tr>
		 <td id="Product"><?php ($return[$value][product_name])?></td>
		 <td id="Price"><?php ($return[$value][price]) ?></td>
		 <td id="image"><?php ($return[$value][image]) ?></td>
		 </script> ";*/


?>


	/*echo "<tr>";
	echo "<td ><$return[$value]</td>";
	echo "<td > $return[$value]</td>";
	echo "<td > $return[$value]</td>";
	echo "<td ></td>";
	/*echo "<td ><input type="button" class="delete" value="Delete"><input type="button" class="update" value="Update"></td>";
	echo "</tr>";*/
}

	
?> -->


<!-- 
foreach ($return as $key => $value) 
{

var product = document.getElementById('tablebody')
product.innerHTML +='<tr>
							<td id="Product"><?php ($return[value][product_name])?></td>
							<td id="Price"><?php ($return[value][price]) ?></td>
							<td id="image"><?php ($return[value][image]) ?></td>
							<td id="Availability"></td>
							<td id="Action"><input type="button" class="delete" value="Delete"><input type="button" class="update" value="Update"></td>
						</tr>' 	


}

 -->



