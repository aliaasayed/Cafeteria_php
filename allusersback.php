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
		.delete
		{
			width: 10px;
			height: 5px;
		}


	</style>


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
			user.innerHTML += '<tr><td id="user_name">'+myarr[i]["user_name"]+'</td><td id="Room_no">'+myarr[i]["Room_no"]+'</td><td id="Picture">'+myarr[i]["Picture"]+'</td><td id="Ext">'+myarr[i]["Ext"]+'</td><td id="action"><input type="button" class"delete" name"deleteproduct" value"Delete"><input type="button" class"update" name"updateproduct" value"update">'


/*<input type="button" class="delete" name="'+choose_file.value+'" id="del'+play_list.length+'" value="Delete">*/



	}


	</script>





</body>

</html>
