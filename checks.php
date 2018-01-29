<?php include('user_class.php');
include('navbar_admin.php');
session_start();

if((!isset($_SESSION['email']))&& (!isset($_SESSION['password'])))
{
		echo "<script>window.location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Font Awesome Icons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
   <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
   <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
    td {
      vertical-align: top;
    }

    #table1,
    #table2,
    #table3,
    #table4,
    #d1 {

    }
    table,th,td{
      border: 1px solid black;
    }
  </style>
</head>

<body>


  <label for="">From</label>
  <input type="date" id='date-from' name="date_from" value="<?php echo $_GET['date_from']?>" required>
  <i class="fa fa-calendar" aria-hidden="true"></i>
  <label for="">To</label>
  <input type="date" id='date-to' name="date_to" value="<?php echo $_GET['date_to']?>" required>
  <i class="fa fa-calendar" aria-hidden="true"></i>
  <label style="color:red"><?php if (@$_GET['invalid']=="invalid_date"){echo "Invalid Date";}?></label>
  <table style="width:50%" class="table table-striped table-inverse">
    <thead>
      <tr>
        <th>Name</th>
        <th>Total Amount</th>
      </tr>
    </thead>
      <?php
      $id_value;
      //$i=0;
      //$query = "SELECT user_id,sum(amount) as amount FROM orders group by user_id";
      $query = "SELECT o.user_id,u.user_name,sum(amount) as amount FROM user u, orders o where u.user_ID=o.user_id group by o.user_id";
      $statement = $conn->prepare($query);
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        //var_dump($row);
        echo "<tr id='".$row['user_id']."'>";
        echo "<td>";
        echo "<a href='#' class='plus'><i class='fa fa-plus-square' style='font-size:20px;color:red'></i></a>"." ".$row['user_name'];
        //$id_value=$row['user_id'];
        echo "</td>";
        echo "<td>";
        echo $row['amount'];
        echo "</td>";
        echo "</tr>";
        //$i++;
      }
      ?>
  </table>

  <div id="d1" style="display:none">any content</div>
  <table id="table1" class="table table-striped table-inverse" style="width:50%;display:<?php if(@$_GET['table1']=='block'){echo 'block';}else{echo 'none';} ?> border: 2px solid black">
    <?php
    //echo $id_value[0];
    if(@$_GET['date_from']!="" && $_GET['date_to']!="")
    {
    //  echo $id_value;
      echo "<thead><tr>";
      echo "<th>Oreder Date</th>";
      echo "<th>Amount</th>";
      echo "</tr></thead>";
    $query = "SELECT order_id,user_id,date,time,amount FROM orders where user_id='".$_GET['user_id']."' and date between '".$_GET['date_from']."' and '".$_GET['date_to']."'";
    $statement = $conn->prepare($query);
    $statement->execute();
    while ($row_order = $statement->fetch(PDO::FETCH_ASSOC)) {
      //var_dump($row);
      echo "<tr id='".$row_order['order_id']."'>";
      echo "<td>";
      echo "<a href='"."'#'"." class='plus_order'><i class='fa fa-plus-square' style='font-size:20px;color:red'></i></a> ".$row_order['date']." ".$row_order['time'];;
      echo "</td>";
      echo "<td>";
      echo $row_order['amount'];
      echo "</td>";
      echo "</tr>";
    }
  }
    ?>

  </table>
  <table id="table2" class="table table-striped table-inverse" style="width:50%;display:<?php if(@$_GET['table2']=='block'){echo 'block';}else{echo 'none';} ?> border: 0px solid black">
    <thead style="display:<?php if(@$_GET['table2']=='block'){echo 'block';}else{echo 'none';} ?>">
      <tr>
        <th colspan="2">Orders </th>
      </tr>
    </thead>

    <?php
    //echo $id_value[0];
    if(@$_GET['date_from']!="" && $_GET['date_to']!="")
    {
    //  echo $id_value;
    @$query = "SELECT product.image,product.product_name
    ,order_product.Quantity,
    product.price,orders.amount FROM product , order_product ,orders WHERE
     order_product.product_id=product.product_ID and order_product.order_id=orders.order_id
      AND   user_id='".$_GET['user_id']."' AND order_product.order_id='".$_GET['order_id']."' ";
    $statement = $conn->prepare($query);
    $statement->execute();
    echo "<tr>";
$total_amount='';
    while ($row_order = $statement->fetch(PDO::FETCH_ASSOC)) {

      echo "<td><figure id='img-admin'>";
      echo "<img src='".$row_order['image']."' width='80' height='80' />";
      echo "<figcaption>".$row_order['product_name']." ".$row_order['price']."LE </figcaption><firgcapyion>Quantity ".$row_order['Quantity']."</figcaption></figure></td>";
      $total_amount = $row_order['amount'];

    }
  echo "<td style='padding-top:100px;text-align:center;'> total ".$total_amount."</td>";
    echo "</tr>";
  }
    ?>

  </table>
</body>
  <script src="js/checks.js"></script>
</html>
