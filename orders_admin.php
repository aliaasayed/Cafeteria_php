<?php
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
  <link rel="stylesheet" href="main.css"/>
<style>
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
            <th>ACTION</th>
          </tr>
        </thead>

<?php
foreach($product1->select_order() as $value){
 extract($value);


//echo "<br> no:".$user_id;
// echo "<br> name:".$product_name;
// echo "<br> price:".$price;
// echo "<br> category:".$category;



  echo  "<tr><td>".$user_id."</td><td>".$order_date."</td><td>".$user_name."</td>";
  echo   "<td>".$Room_no."</td><td>".$Ext."</td><td>".$status."</td></tr>";
  if (is_array($product2->order_product($user_id,$order_date)) || is_object($product2->order_product($user_id,$order_date)))
  {
foreach($product2->order_product($user_id,$order_date) as $values) {
  extract($values);
   echo  "<tr><td>".$image."</td><td>".$product_name."</td><td>".$Quantity."</td>";
   echo   "<td>".$price."</td></tr>";
  echo "<tr><td></td><td></td><td></td><td></td><td>Total</td><td>".$amount."</td></tr>";
  echo       "<tbody>";
}
}

}

 ?>
</table>
</section>
</div>";
</body>
</html>
