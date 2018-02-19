<?php
session_start();

if((!isset($_SESSION['email']))&& (!isset($_SESSION['password'])))
{
		echo "<script>window.location.href='index.php'</script>";
}
include('product_class.php');
$product1 = new product();
$product2 = new product();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
   <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
   <link rel="stylesheet" type="text/css" href="css/style.css">

<style>
#tr{
height: 150px;

}
#img-admin{
float: right;
  border: none;
  width: 100%;
  height: 50px;

  text-align: right;
}
#admin{
  padding-top: 100px;
float: right;
width: 100%;
height: 200px;
border: none;
}
</style>
</head>
<body>
  <?php
include('navbar_admin.php');
?>
  <div class="container">

<div id="admin">
  <figure id="img-admin">

  <img src='img_avatar2.png' width="80" height="80" />
  <figcaption>Admin page</figcaption>

  </figure>
</div>
    <section style="border:none">
    <h2>Orders</h2>
      <table class="table table-striped table-inverse">
        <thead>
          <tr>
            <th>No</th>
            <th>Order Date</th>
            <th> Name</th>
            <th>Room </th>
            <th>EXT . </th>
						<th>Status </th>
            <th>ACTION</th>
          </tr>
        </thead>

<?php
foreach($product1->select_order() as $value){
 extract($value);

  echo  "<tr><td>".$user_id."</td><td>".$order_date."</td><td>".$user_name."</td>";
  echo   "<td>".$Room_no."</td><td>".$Ext."</td><td>".$status."</td><td><a href='update_status.php?id=$order_id' ><button value='Deliver' >Deliver</button></a></td></tr><tr id='tr'>";
  $total_amount='';
  if (is_array($product2->order_product($user_id,$order_id)) || is_object($product2->order_product($user_id,$order_id)))
  {
foreach($product2->order_product($user_id,$order_id) as $values) {
  extract($values);
//echo $values['image'];
echo "<td><figure id='img-admin'>";
echo "<img src='$image' width='80' height='80' />";
echo "<figcaption>".$product_name." ".$price. "LE </figcaption><firgcapyion>Quantity ".$Quantity."</figcaption></figure>";
$total_amount=$amount;
}
}


echo "</tr>";
echo "<tr><td colspan=6 style='text-align:right;'> total : ".$total_amount."</td></tr>";
}
 ?>

<tr><td></td><td></td><td></td><td></td></tr>
<tbody>
</table>
</section>
</div>
</body>
</html>
