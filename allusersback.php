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
			<header>All Users 
			<a href="adduser.html"> Add user</a>
			</header>
			<div>
				<table class="table table-striped table-dark" id="tablebody">
					<thead>
					<tr>
						<th> Name</th>
						<th> Room</th>
						<th> image</th>
						<th> Ext.</th>
						<th> Action</th>
					</tr>
					</thead>

					<tr>

					</tr>


				</table>
			</div>
	
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'connection.php';
include 'user_class.php';


$User = new user();
$return = array();
$return = $User->getAllUser();
json_encode($return);

?>





<script type="text/javascript">
	var user = document.getElementById('tablebody');
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
			product.innerHTML += '<tr id="row'+myarr[i]["user_ID"]+'"><td id="user">'+myarr[i]["user_name"]+'</td><td id="Room_no">'+myarr[i]["Room_no"]+'</td><td id="image">'+myarr[i]["Picture"]+'</td><td id="Ext">'+myarr[i]["Ext"]+'</td><td id="action"><input type="button" class="delete" name="deleteuser" value="Delete" id="'+myarr[i]["user_ID"]+'"><input type="button" class="update" name="updateuser" id="update'+myarr[i]["user_ID"]+'" value="update"></td></tr>'
	}



for(let i=0; i<Object.keys(myarr).length; i++)
{
	document.getElementById(myarr[i]["user_ID"]).addEventListener("click",function(e){
				e.preventDefault()
				document.getElementById("row"+e.target.id).outerHTML = ""
				window.location.href='deleteuser.php?userid='+myarr[i]["user_ID"];
				

})
}



for(let i=0; i<Object.keys(myarr).length; i++)
{
	document.getElementById("update"+myarr[i]["user_ID"]).addEventListener("click",function(e){
				e.preventDefault()
				
				window.location.href='updateuser.php?userid='+myarr[i]["user_ID"];
				

				
				})
}

	</script>





</body>

</html>
